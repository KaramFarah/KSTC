<?php

namespace App\Http\Controllers;

use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends BaseController
{

    public function index()
    {
        // abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($search = request()->get('search')){
            $permissions = Permission::where('name', 'like', "%$search%")->orderBy('name')->get();
        }
        else{
            $permissions = Permission::orderBy('name')->get();
        }

        $pageTitle = [
            'title' => 'الصلاحيات',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'الصلاحيات',
                    'link'  => route('permissions.index')
                ],
            ]
        ];

        return view('dashboard.permissions.index', compact('permissions', 'pageTitle'));
    }

    public function create()
    {
        // abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pageTitle = [
            'title' => 'إضافة صلاحيات',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'الصلاحيات',
                    'link'  => route('permissions.index')
                ],
            ]
        ];

        return view('dashboard.permissions.create', compact('pageTitle'));
    }

    public function store(PermissionRequest $request)
    {
        $permission = Permission::create($request->all());
        if ($permission)
            return redirect()->route('permissions.index')->with(['success' => __('Added')]);
        else
            return redirect()->route('permissions.index')->with(['danger' => __('Error')]);
    }

    public function edit(Permission $permission)
    {
        // abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pageTitle = [
            'title' => 'تعديل الصلاحية',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'الصلاحيات',
                    'link'  => route('permissions.index')
                ],
                [
                    'title' => $permission->name,
                    'link'  => route('permissions.edit', ['permission' => $permission])
                ],
            ]
        ];

        return view('dashboard.permissions.edit', compact('permission','pageTitle'));
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect()->route('permissions.index')->with(['info' => __('Updated')]);
    }

    public function show(Permission $permission)
    {
        // abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pageTitle = [
            'title' => 'عرض الصلاحية',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'الصلاحيات',
                    'link'  => route('permissions.index')
                ],
                [
                    'title' => $permission->name,
                    'link'  => route('permissions.show', ['permission' => $permission])
                ],
            ]
        ];

        return view('dashboard.permissions.show', compact('permission', 'pageTitle'));
    }

    public function destroy(Permission $permission)
    {
        // abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->delete();
        return redirect()->route('permissions.index')->with(['danger' => __('Deleted')]);
    }

    public function massDestroy(MassDestroyPermissionRequest $request)
    {
        Permission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
