@extends('dashboard.layout.app')
@section('content')
    <div class="row">
        <div class="col">
            <div class="dashboard-panel border bg-white rounded overflow-hidden w-100">
                <div class="overflow-x-scroll font-fifteen">
                    <div class="m-3">
                        {{-- @can('role_create') --}}
                        @if(auth()->user()->isAdmin)
                    
                        <a class="btn btn-success rounded-pill" href="{{ route('roles.create') }}" data-value="" data-title="{{ __('Add Role') }}">
                            <i class="bi bi-plus"></i> {{ __('Add Role') }}
                        </a>
                    @endif
                        {{-- @endcan --}}
                        <div class="bg-white p-3">
                            <div class="row">
                                <div class="col-xl">
                                    <form class="form-boder">
                                        <div class="row">
                                            <div class="col-10">
                                                <x-inputs.text inputName="search" inputId="search" inputLabel="" error="{{ $errors->has('search') ? $errors->first('search') : '' }}" inputValue="{{ old('search', request()->get('search') ?? '') }}" class="mb-3" inputPlaceholder="{{ __('Search') }}" />
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="bi bi-filter"></i> {{ __('Apply') }}
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
                                        <th class="">
                                            {{ __('Id') }}
                                        </th>
                                        <th>
                                            {{ __('Name') }}
                                        </th>
                                        <th class="w-50">
                                            {{ __('Permissions') }}
                                        </th>
                                        <th class="w-25">
                                            {{ __('Options') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($roles as $key => $role)
                                        <tr data-entry-id="{{ $role->id }}">
                                            <td>
                                                {{ $role->id }}
                                            </td>
                                            <td>
                                                <h5 class="text-secondary font-400">{{ $role->name }}</h5>
                                            </td>
                                            <td class="w-50">
                                                @foreach($role->permissions as $key => $item)
                                                    <span class="badge bg-info fs-6 m-1">{{ $item->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{-- @can('role_show') --}}
                                                @if(auth()->user()->isAdmin)
                    
                                                <a class="btn btn-outline-primary viewDetails" href="{{route('roles.show' , ['role' => $role])}}" data-value="{{ route('roles.show', $role->id) }}" data-title="{{ __('Role Details') }}">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                @endif
                                                {{-- @endcan --}}
                                                {{-- @can('role_edit') --}}
                                                @if(auth()->user()->isAdmin)
                    
                                                    <a class="btn btn-outline-primary" href="{{ route('roles.edit', $role->id) }}" data-value="" data-title="Edit">
                                                        <i class="bi bi-pen"></i>
                                                    </a>
                                                @endif
                                                {{-- @endcan --}}
                                                {{-- @can('role_delete') --}}
                                                @if(auth()->user()->isAdmin)
                    
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this item?') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                </form>
                    @endif
                                                {{-- @endcan --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">Empty</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection