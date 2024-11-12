@extends('dashboard.layout.app')
@section('content')
<div class="text-end mb-30">
    {{-- @can('user_edit') --}}
    @if(auth()->user()->isAdmin)
                    
    <a class="btn btn-primary btn" href="{{ route('users.edit', $user->id) }}" data-value="">
        <i class="bi bi-pen"></i> {{ __('تعديل') }}
    </a>
                    @endif
    {{-- @endcan --}}
    {{-- @can('user_delete') --}}
    @if(auth()->user()->isAdmin)
                    
    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ __('هل أنت متأكد من حذف هذا العنصر؟') }}');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> {{ __('حذف') }}</button>
    </form>
                    @endif
    {{-- @endcan --}}
</div>
<div class="accordion" id="accordionShowDetails">
    <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button bg-light text-secondary d-block text-truncate px-4 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#details" aria-expanded="true" aria-controls="details">
            <h5>{{ __('معلومات المستخدم') }}</h5>
          </button>
        </h2>
        <div id="details" class="accordion-collapse collapse show" data-bs-parent="#accordionShowDetails">
            <div class="accordion-body">
                <div class="row bg-white mb-30">
                    <div class="col table-responsive">
                        <table class="w-100 items-list bg-transparent">
                            <tbody>
                                <tr class="">
                                    <th class="w-25">
                                        {{ __('#') }}
                                    </th>
                                    <td class="w-75">
                                        {{ $user->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ __('البريد الإلكتروني') }}
                                    </th>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ __('عيد الميلاد') }}
                                    </th>
                                    <td>
                                        {{ $user->birthdate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ __('الأدوار') }}
                                    </th>
                                    <td>
                                        @foreach($user->roles as $key => $roles)
                                            <span class="badge rounded-pill bg-info">{{ $roles->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection