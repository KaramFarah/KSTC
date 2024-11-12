@extends('dashboard.layout.app')
@section('content')

<section class="section dashboard">
  <div class="row bg-white p-5 text-center">
    <h2>مرحباً بك {{auth()->user()->name}}</h2>
  </div>
</section>


@endsection