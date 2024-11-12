@extends('dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="dashboard-panel border bg-white rounded overflow-hidden w-100">
            <div class="overflow-x-scroll font-fifteen">
                <div class="m-3">
                    {{-- @can('user_create') --}}
                    @if(auth()->user()->isAdmin)
                    
                    <a class="btn btn-success rounded-pill" href="{{ route('users.create') }}" data-value="" data-title="{{ __('إضافة مستخدم') }}">
                        <i  class="bi bi-plus"></i> {{ __('إضافة مستخدم') }}
                    </a>
                    @endif
                    {{-- @endcan --}}
                    <div class="bg-white p-3">
                        <div class="row">
                            <div class="col-xl">
                                <form class="form-boder" action={{route('users.index')}}>
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <x-inputs.text inputName="id" inputId="id" inputLabel="{{ __('#') }}" error="{{ $errors->has('id') ? $errors->first('id') : '' }}" inputValue="{{ old('id', request()->get('id') ?? '') }}" />
                                        </div>
                                        <div class="col-md-4">
                                            <x-inputs.text inputName="name" inputId="name" inputLabel="{{ __('الإسم') }}" error="{{ $errors->has('name') ? $errors->first('name') : '' }}" inputValue="{{ old('name', request()->get('name') ?? '') }}"/>
                                        </div>
                                        <div class="col-md-4">
                                            <x-inputs.text inputName="email" inputId="email" inputLabel="{{ __('البريد الإلكتروني') }}" error="{{ $errors->has('email') ? $errors->first('email') : '' }}" inputValue="{{ old('email', request()->get('email') ?? '') }}" />
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <br>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-filter"></i> {{ __('بحث') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table w-100 items-list bg-transparent">
                            <thead>
                                <tr class="bg-white">
                                    <th>
                                        {{ __('#') }}
                                    </th>
                                    <th>
                                        {{ __('الإسم') }}
                                    </th>
                                    <th>
                                        {{ __('الدور') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $key => $user)
                                    <tr data-entry-id="{{ $user->id }}">
                                        <td>
                                            {{ $user->id }}
                                        </td>
                                        <td class="w-50">
                                            <h5 class="text-secondary font-400">{{ $user->name }}</h5>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            @foreach($user->roles as $key => $item)
                                                <span class="badge bg-info fs-6 m-1">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{-- @can('user_show') --}}
                                            @if(auth()->user()->isAdmin)
                    
                                            <a class="btn btn-mini btn-outline-primary" role="button" href="{{ route('users.show', $user->id) }}" data-value="" data-title="{{ __('معلومات المستخدم') }}" >
                                                <i class="bi bi-eye"></i>
                                            </a>
                    @endif
                                            {{-- @endcan --}}
                                            {{-- @can('user_edit') --}}
                                            @if(auth()->user()->isAdmin)
                    
                                            <a class="btn btn-mini btn-outline-primary" href="{{ route('users.edit', $user->id) }}" data-value="" data-title="{{ sprintf('%s %s', __('Edit'), $user->name) }}">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                            @endif
                                            {{-- @endcan --}}
                                            @if(auth()->user()->isAdmin)
                    
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ __('هل أنت متأكد من إزالة هذا العنصر؟') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-mini btn-outline-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                    @endif
                                            {{-- @can('user_delete') --}}
                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">Empty</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{$users->links()}}
                        </div>
                        <div class="d-flex justify-content-center" >
                            {{-- @include('fullwidth.partials.pagnitaion' , ['items' => $users]);                         --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection