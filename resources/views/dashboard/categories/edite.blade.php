<form method="POST" action="{{route('categories.update' , $category->id)}}" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    @include('dashboard.categories.form')
</form>
  