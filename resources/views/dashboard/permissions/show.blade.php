<div class="row table-responsive">
    <div class="col mb-3">
        <table class="w-100 items-list bg-transparent">
            <tbody>
                <tr class="bg-white">
                    <th class="w-25">
                        {{ __('Id') }}
                    </th>
                    <td>
                        {{ $permission->id }}
                    </td>
                    
                </tr>
                <tr>
                    <th>
                        {{ __('Title') }}</h5>
                    </th>
                    <td>
                        <h5 class="text-secondary font-400">{{ $permission->title }}</h5>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col">
        @if(auth()->user()->isAdmin)
            <a class="btn btn-primary" href="{{ route('permissions.edit', $permission->id) }}">
                <i class="fa fa-edit"></i> {{ __('Edit') }}
            </a>
        @endif
        {{-- @can('permission_edit') --}}
        {{-- @endcan --}}
        {{-- @can('permission_delete') --}}
        @if(auth()->user()->isAdmin)
                    
        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this item?') }}');" style="display: inline-block;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('Delete') }}</button>
        </form>
        @endif
        {{-- @endcan --}}
    </div>
</div>