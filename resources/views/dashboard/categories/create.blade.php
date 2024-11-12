<form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
    @csrf
    @include('dashboard.categories.form')
</form>