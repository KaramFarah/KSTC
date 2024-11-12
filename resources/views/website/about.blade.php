@extends('website.website-layouts.app')
@section('content')
        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center d-flex justify-content-center">
                    <div 
                    {{-- style="opacity: 0.6;" --}}
                    class="bg-dark w-50 rounded p-4">
                        <h3 class="text-secondary text-center">How Are We?</h3>
                        <p class="text-center text-light">We are a Company specialized in importing and selling fresh fruits and vegetables from all over the world to serve the markets of UAE</p>
                        <div style="border-left: solid 5px #f15927" class="mt-5 ps-3">
                            <div class="d-flex">
                                <i  class="bi bi-circle-fill text-secondary me-2"></i>
                                <p class=" text-light">
                                    Our mission is based on importing the best and highest quality,
                                     watch list falls within the international list of continious excellence in quality over a devstating period 
                                </p>
                            </div>
                            <div class="d-flex">
                                <i class="bi bi-circle-fill text-secondary me-2"></i>
                                <p class=" text-light">
                                    We strive to meet the demands of our customers and consumers of fresh fruits and vegetables by importing the best types and applying quality standards in access, 
                                    storage and distribution up to human consumption
                                </p>
                            </div>
                            <div class="d-flex">
                                <i class="bi bi-circle-fill text-secondary me-2"></i>
                                <p class=" text-light">
                                    We have a specialized team to market and promote our products and ensure that it reach the market fresh with the necessary standards, 
                                    and work on an annual plan based our terms to obtain a better market share every year.
                                </p>
                            </div>
                           
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Featurs Section Start -->
        <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-car-side fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Free Shipping</h5>
                                <p class="mb-0">Free on order over $300</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-user-shield fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Security Payment</h5>
                                <p class="mb-0">100% security payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-exchange-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>30 Day Return</h5>
                                <p class="mb-0">30 day money guarantee</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fa fa-phone-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>24/7 Support</h5>
                                <p class="mb-0">Support every time fast</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs Section End -->

@endsection