@extends('dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="dashboard-panel border bg-white rounded overflow-hidden w-100">
            <div class="overflow-x-scroll font-fifteen">
                <div class="m-3">
                    @if(auth()->user()->isAdmin)
                        <a class="btn btn-success rounded-pill" href="{{ route('permissions.create') }}" data-value="" data-title="{{ __('Add Permission') }}">
                            <i class="bi bi-plus"></i> {{ __('Add Permission') }}
                        </a>
                    @endif
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
                                    <th>
                                        {{ __('Id') }}
                                    </th>
                                    <th>
                                        {{ __('Name') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $key => $permission)
                                    <tr data-entry-id="{{ $permission->id }}">
                                        <td>
                                            {{ $permission->id ?? '' }}
                                        </td>
                                        <td>
                                            <h5 class="text-secondary font-400">{{ $permission->name ?? '' }}</h5>
                                        </td>
                                        <td>
                                            @if(auth()->user()->isAdmin)                    
                                                <a class="btn btn-outline-primary" href="{{ route('permissions.edit', $permission->id) }}">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                            @endif
                                            @if(auth()->user()->isAdmin)                    
                                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this item?') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection