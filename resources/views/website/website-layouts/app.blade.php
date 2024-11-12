<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>KSTC - Store</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        @include('website.website-layouts.website-styles')
    </head>

    <body>
        <!-- Spinner Start -->
        {{-- <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div> --}}
        <!-- Spinner End -->

        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">UAE - Abu Dhabi - Al mina Street</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">info@re-posts.com</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">AlKhateb-sons@hotmail.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                        <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                        <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="#" class="navbar-brand"><h1 class="text-primary display-6"><img src="{{asset('assets/frontEnd/img/logo.png')}}" alt=""></h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{route('website.home')}}" class="nav-item nav-link {{Route::currentRouteName() === 'website.home' ? 'active' : ''}}">Home</a>
                            
                            <a href="{{route('website.products') . '?category=1'}}" class="nav-item nav-link {{request()->category == 1 ? 'active' : ''}}">Vegetables</a>
                            <a href="{{route('website.products') . '?category=2'}}" class="nav-item nav-link {{request()->category == 2 ? 'active' : ''}}">Fruites</a>
                            <a href="{{route('website.products') . '?category=3'}}" class="nav-item nav-link {{request()->category == 3 ? 'active' : ''}}">Pre-Cut</a>
                            <a href="{{route('website.products') . '?category=4'}}" class="nav-item nav-link {{request()->category == 4 ? 'active' : ''}}">Pre-Packed</a>
                            <a href="{{route('website.about')}}" class="nav-item nav-link {{Route::currentRouteName() === 'website.about' ? 'active' : ''}}">About Us</a>
                            <a href="{{route('website.contact')}}" class="nav-item nav-link {{Route::currentRouteName() === 'website.contact' ? 'active' : ''}}">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-primary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            {{-- karam --}}
                            {{-- {{route('website.cart')}} --}}
                            
                            <a href="{{route('cart.index')}}" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                                    @if(null !== auth()->user())
                                        @php
                                            $userCart = Binafy\LaravelCart\Models\Cart::query()->firstOrCreate(['user_id' => auth()->user()->id]);
                                        @endphp
                                    <span id="cartItemCount">{{$userCart->items()->count()}}</span>
                                    @else
                                    0
                                    @endif
                                </span>
                            </a>
                            {{-- <form action="route('website.cart')" method="POST">
                                @csrf
                                <button type="submit" class="position-relative me-4 my-auto">
                                    <i class="fa fa-shopping-bag fa-2x"></i>
                                    <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                                </button>
                            </form> --}}
                            <a href="#" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->

        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

        @yield('content')

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   
       
        {{-- <a href="https://wa.me/+97152562225" class="btn btn-primary border-3 border-primary rounded-circle go-to-whatsapp"><i class="bi bi-whatsapp"></i></a>    --}}
        <a style="width: 60px;height: 60px; font-size:x-large" href="https://wa.me/+971588567261" class="btn btn-primary border-3 border-primary rounded-circle go-to-whatsapp"><i class="bi bi-whatsapp"></i></a>   
        @include('website.website-layouts.footer')

        @include('website.website-layouts.website-scripts')

    </body>

</html>