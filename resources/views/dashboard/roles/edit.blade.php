@extends('dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col mb-3">
        <div class="border rounded bg-white p-3">
            <form method="POST" action="{{ route("roles.update", [$role->id]) }}" enctype="multipart/form-data" class="form-boder">
                @method('PUT')
                @csrf
                @include('dashboard.roles.form')
            </form>
        </div>
    </div>
</div>
@endsection