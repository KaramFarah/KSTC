<form id="dropZone-form" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data" >
    @csrf
    @include('dashboard.products.form' , ['product' => new App\Models\Admin\Product()])
</form>
