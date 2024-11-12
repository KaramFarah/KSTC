<div class="row">
    <div class="col-md-12">
        <x-inputs.text inputName="name" inputId="name" inputLabel="{{ __('Name') }}" inputRequired="required" inputValue="{{ old('name', $role->name ?? '') }}" inputHint="" inputClass="" class="mb-3" type="text"/>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <x-inputs.select showButtons=false inputName="permissions[]" inputId="permissions" inputLabel="{{ __('Permissions') }}" placeholder="{{ __('Select Permissions') }}" inputRequired="required" :inputValue="$role->permissions" :inputData="$permissions" inputHint="" inputClass="select2" class="mb-3" inputType="multiple"/>
    </div>
</div>
<button class="btn btn-primary" type="submit">
    <i class="bi bi-save"></i> {{ __('Save') }}
</button>
<a class="btn btn-secondary" href="{{ route('roles.index') }}">{{ __('Close') }}</a>