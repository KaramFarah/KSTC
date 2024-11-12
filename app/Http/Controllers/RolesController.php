<?php

namespace App\Http\Controllers;

use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Gate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends BaseController
{
    public function index()
    {
        // abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = $this->search();

        $permissions = []; //Permission::orderBy('title')->pluck('title', 'id')->all();

        $pageTitle = [
            'title' => 'الأدوار',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'الأدوار',
                    'link'  => route('roles.index')
                ]
            ]
        ];

        return view('dashboard.roles.index', compact('pageTitle', 'roles', 'permissions')); // 'roles', 
    }

    public function search(){
        $query = Role::orderBy('name');

        request()->get('id') ? $query->where('id', request()->get('id')) : '';
        
        if($search = request()->get('search')){
            $query->where('title', 'like', "%$search%")->orWhereHas('permissions', function (Builder $subQuery) {
                $subQuery->where('title', 'like', "%".request()->search."%");
            });  
        }

        // if(request()->has('title') && request()->get('title')){
        //     $query->whereHas('title', 'like', '%'.request()->get('title').'%');  
        // }
        
        return $query->get();
    }

    public function create()
    {
        // abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::pluck('name', 'id');


        $pageTitle = [
            'title' => 'أضافة دور',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'الأدوار',
                    'link'  => route('roles.index')
                ]
            ]
        ];

        return view('dashboard.roles.create', compact('permissions', 'pageTitle'));
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index')->with(['success' => __('Added')]);
    }

    public function edit(Role $role)
    {
        // abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        $permissions = Permission::pluck('name', 'id');

        $pageTitle = [
            'title' => 'تعديل الدور',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'الأدوار',
                    'link'  => route('roles.index')
                ],
                [
                    'title' => $role->name,
                    'link'  => route('roles.edit', ['role' => $role])
                ],
            ]
        ];
        return view('dashboard.roles.edit', compact('permissions', 'role', 'pageTitle'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index')->with(['info' => __('Updated')]);
    }

    public function show(Role $role)
    {
        // abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        $pageTitle = [
            'title' => 'معلومات الدور',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'الأدوار',
                    'link'  => route('roles.index')
                ],
                [
                    'title' => $role->name,
                    'link'  => route('roles.show', ['role' => $role])
                ],
            ]
        ];

        return view('dashboard.roles.show', compact('role', 'pageTitle'));
    }

    public function destroy(Role $role)
    {
        // abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->delete();
        return redirect()->route('roles.index')->with(['danger' => __('Deleted')]);
        
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
