@extends('website.website-layouts.app')
@section('content')
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Shop</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
            @if (request()->category == 1)
                <h1 class="mb-4">Fresh Vegetables shop</h1>
            @elseif (request()->category == 2)
                <h1 class="mb-4">Fresh Fruites shop</h1>
            @elseif (request()->category == 3)
                <h1 class="mb-4">Pre-Cute shop</h1>
            @elseif (request()->category == 4)
                <h1 class="mb-4">Pre-Packed shop</h1>
            @endif
                
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                           
                            <div class="col-lg-12">
                                <div class="row g-4 justify-content-center">
                                    @foreach ($products as $item)
                                        <div class="col-md-6 col-lg-6 col-xl-4">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img style="min-height: 416px; border-bottom: none !important;" src="{{$item->originalImage ?? ''}}" class="img-fluid w-100 rounded-top border border-primary" alt="">
                                                </div>
                                                <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$item->category->name}}</div>
                                                <div class="p-4 border border-primary border-top-0 rounded-bottom">
                                                    <h4>{{$item->name}}</h4>
                                                    <p>{{$item->origin}}</p>
                                                    <p>{{$item->description}}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        @if ($item->hasDiscount)
                                                            <p class="text-dark fs-5 fw-bold mb-0"><s style="font-size: 16px">  {{$item->price}}</s> AED {{$item->discountPrice}} / {{$item->priceType}}</p>
                                                        @else
                                                            <p class="text-dark fs-5 fw-bold mb-0"> AED {{$item->price}}/ {{$item->priceType}}</p>
                                                        @endif
                                                        <button route="{{route('cart.add' , ['product' => $item])}}" class="btn border border-primary rounded-pill px-3 text-primary add-to-cart"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="">

                                    </div>
                                    
                                    {{$products->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->
@endsection