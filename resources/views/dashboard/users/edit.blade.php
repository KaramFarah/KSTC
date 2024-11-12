@extends('dashboard.layout.app')
@section('content')

            <form method="POST" action="{{ route("users.update", [$user->id]) }}" enctype="multipart/form-data" class="form-boder">
                @method('PUT')
                @csrf
                @include('dashboard.users.form')
            </form>
@endsection