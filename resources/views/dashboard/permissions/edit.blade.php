@extends('dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col mb-3">
        <div class="border rounded bg-white p-3">
            <form method="POST" action="{{ route("permissions.update", [$permission->id]) }}" class="form-boder" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @include('dashboard.permissions.form')
            </form>
        </div>
    </div>
</div>
@endsection