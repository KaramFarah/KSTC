<div class="row">
    <div class="col mb-3">
        <div class="border rounded bg-white p-3">
            <h4 class="mb-4">{{__('معلومات المستخدم')}}</h4>
            <div class="row">
                <div class="col-md-4">
                    <x-inputs.text inputName="name" inputId="name" inputLabel="{{ __('الإسم') }}" inputRequired="required" inputValue="{{ old('name', $user->name ?? '') }}" inputHint="" inputClass="required" class="mb-3" type="text"/>
                </div>
                <div class="col-md-4">
                    <x-inputs.text inputName="email" inputId="email" inputLabel="{{ __('البريد الإلكتروني') }}" inputRequired="required" inputValue="{{ old('email', $user->email ?? '') }}" inputHint="" inputClass="required" class="mb-3" type="text"/>
                </div>
                <div class="col-md-4">
                    <x-inputs.text inputName="password" inputId="password" inputLabel="{{ __('كلمة المرور') }}" inputRequired="{{ $user->password ? '' : 'required' }}" inputValue="{{ old('password', '') }}" inputHint="" inputClass="" class="mb-3" type="password"/>
                </div>
            </div>
            
            <x-inputs.select showButtons=false inputName="roles[]" inputId="roles" inputLabel="{{ __('الأدوار') }}" placeholder="{{ __('اختر دور أو أكثر') }}" inputRequired="required" :inputValue="$user->roles" :inputData="$roles" inputHint="" inputClass="select2 required" class="mb-3" inputType="multiple"/>
            </div>
        </div>
    </div>
    
    <button class="btn btn-primary" type="submit">{{ __('حفظ') }}</button>
    <a class="btn btn-secondary" href="{{ route('users.index') }}">{{ __('إغلاق') }}</a>

    @can('tag_create')
    @push('scripts')
        <script>
            $(document).ready(function () {
                $("#spoken_languages").select2({
                    tags: true,
                    width: '100%'
                })
            }) 
        </script>
    @endpush
@endcan