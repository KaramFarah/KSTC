@extends('dashboard.layout.app')
@section('content')
    <div class="row">
        <div class="col mb-3">
            <div class="border rounded bg-white p-3">
                <form method="POST" action="{{ route("permissions.store") }}" class="form-boder" enctype="multipart/form-data">
                    @csrf
                    @include('dashboard.permissions.form', ['permission' => New \App\Models\Permission])
                </form>
            </div>
        </div>
    </div>
@endsection