@extends('dashboard.layout.app')
@section('content')
    <div class="row">
        <div class="col mb-3">
            <div class="border rounded bg-white p-3">
                <form method="POST" action="{{ route("roles.store") }}" enctype="multipart/form-data" class="form-boder">
                    @csrf
                    @include('dashboard.roles.form', ['role' => new \App\Models\Role ])
                </form>
            </div>
        </div>
    </div>
@endsection