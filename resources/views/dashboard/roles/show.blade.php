@extends('dashboard.layout.app')
@section('content')

    <div class="row table-responsive">
        <div class="col mb-3">
            <table class="w-100 items-list bg-transparent">
                <tbody>
                    <tr class="bg-white">
                        <th class="w-25">
                            {{ __('Id') }}
                        </th>
                        <td>
                            {{ $role->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Name') }}
                        </th>
                        <td>
                            <h5 class="text-secondary font-400">{{ $role->name }}</h5>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Permissions') }}
                        </th>
                        <td>
                            @foreach($role->permissions as $permissions)
                                <span class="badge bg-info">{{ $permissions->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr >
                        <th>
                            {{ __('Users') }}
                        </th>
                        <td>
                            @foreach($role->users as $user)
                                <span class="badge bg-warning fs-6 m-1">{{ $user->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{-- @can('role_edit') --}}
            @if(auth()->user()->isAdmin)
                    
            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">
                <i class="bi bi-pen"></i> {{ __('Edit') }}
            </a>
                    @endif
            {{-- @endcan --}}
            {{-- @can('role_delete') --}}
            @if(auth()->user()->isAdmin)
                    
            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this item?') }}');" style="display: inline-block;">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> {{ __('Delete') }}</button>
            </form>
                    @endif
            {{-- @endcan --}}
        </div>
    </div>
@endsection