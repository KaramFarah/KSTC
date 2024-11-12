@extends('dashboard.layout.app')
@section('content')
    <form method="POST" action="{{ route("users.store") }}" enctype="multipart/form-data" class="form-boder">
        @csrf
        @include('dashboard.users.form', ['user' => New \App\Models\User ])
    </form>
@endsection