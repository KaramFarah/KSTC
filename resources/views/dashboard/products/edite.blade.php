<form id="dropZone-form" method="POST" action="{{route('products.update' , $product->id)}}" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    @include('dashboard.products.form')
</form>
  