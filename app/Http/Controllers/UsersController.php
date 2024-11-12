<?php

namespace App\Http\Controllers;

use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends BaseController
{

    public function index()
    {
        // abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = $this->search();
        $pageTitle = [
            'title' => 'المستخدمين',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'السمتخدمين',
                    'link'  => route('users.index')
                ]
            ]
        ];
        return view('dashboard.users.index', compact('users', 'pageTitle'));
    }

    public function search(){
        $query = User::orderBy('name');

        request()->get('id') ? $query->where('id', request()->get('id')) : '';
        
        if(request()->has('name') && request()->get('name')){
            $query->where('name', 'like', '%'.request()->get('name').'%');  
        }

        if(request()->has('email') && request()->get('email')){
            $query->where('email', 'like', '%'. request()->get('email').'%');  
        }
        
        return $query->paginate(100)->appends([
            'id' => request()->get('id'),
            'name' => request()->get('name'),
            'email' => request()->get('email'),
        ]);
    }

    public function create()
    {
        // abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('name', 'id');
        $pageTitle = [
            'title' => 'إضافة مستخدم',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'السمتخدمين',
                    'link'  => route('users.index')
                ]
            ]
        ];
        return view('dashboard.users.create', compact('roles' ,'pageTitle'));
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        if ($user){
            $user->roles()->sync($request->input('roles', []));

            return redirect()->route('users.index', $user)->with(['success' => 'Added']);
        }
        else{
            return redirect()->route('users.index')->with(['danger' => 'Error!']);
        }
    }

    public function edit(User $user)
    {
        // abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');
        $roles = Role::pluck('name', 'id');

        $pageTitle = [
            'title' => 'تعديل المستخدم',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'السمتخدمين',
                    'link'  => route('users.index')
                ],
                [
                    'title' => $user->name,
                    'link'  => route('users.show', ['user' => $user])
                ],
            ]
        ];


        return view('dashboard.users.edit', compact( 'pageTitle', 'roles', 'user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $inputData = $request->all();
        $inputData['password'] = is_null($request->password) ? $user->password : $request->password;        
        $user->update($inputData);
        $user->roles()->sync($request->input('roles', []));


        return redirect()->route('users.index')->with(['info' => 'Updated']);
    }

    public function show(User $user)
    {
        // abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');
        $pageTitle = [
            'title' => 'معلومات المستخدم',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'السمتخدمين',
                    'link'  => route('users.index')
                ],
                [
                    'title' => $user->name,
                    'link'  => route('users.show', ['user' => $user])
                ],
            ]
        ];


        return view('dashboard.users.show', compact( 'pageTitle' , 'user'));
    }

    public function destroy(User $user)
    {
        // abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();
        return redirect()->route('users.index')->with(['danger' => 'Deleted']);
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}