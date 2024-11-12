<div class="row">
    <div class="col-md-12">
        <x-inputs.text inputName="name" inputId="name" inputLabel="{{ __('Title') }}" inputRequired="required" inputValue="{{ old('name', $permission->name ?? '') }}" inputHint="" inputClass="" class="mb-3" type="text"/>
    </div>
</div>
<button class="btn btn-primary" type="submit">
    <i class="bi bi-save"></i> {{ __('Save') }}
</button>
<a class="btn btn-secondary" href="{{ route('permissions.index') }}">{{ __('Close') }}</a>