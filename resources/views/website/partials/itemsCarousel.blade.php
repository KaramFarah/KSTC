@foreach ($items as $item)
    <div class="border border-primary rounded position-relative vesitable-item">
        <div class="vesitable-img">
            <img style="max-height: 200px;" src="{{$item->originalImage}}" class="img-fluid w-100 rounded-top" alt="">
        </div>
        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">{{ Str::ucfirst($item->category->name)}}</div>
        <div class="p-4 rounded-bottom">
            <h4>{{$item->name}}</h4>
            <p></p>
            <p></p>
            <div class="d-flex justify-content-between flex-lg-wrap">
                @if ($item->hasDiscount)
                    <p class="text-dark fs-5 fw-bold mb-0"><s style="font-size: 16px">  {{$item->price}}</s> AED {{$item->discountPrice}} / {{$item->priceType}}</p>
                @else
                    <p class="text-dark fs-5 fw-bold mb-0"> AED {{$item->price}}/ {{$item->priceType}}</p>
                @endif
                <button route="{{route('cart.add' , ['product' => $item])}}" class="add-to-cart btn border border-primary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</button>
            </div>
        </div>
    </div>
@endforeach