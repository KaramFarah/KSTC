@extends('website.website-layouts.app')
@section('content')
        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto mt-5" style="max-width: 700px;">
                                <h1 class="text-primary">Get in touch</h1>
                                <p class="mb-4">Pleas feel free to Contact our customer services to place your order any time you want.</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <iframe class="rounded w-100"
                                
                                style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29038.7896572544!2d54.348264457981635!3d24.525316990742926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e66de29cbaa17%3A0x9830676b298225a5!2sAl%20Mina%20-%20Mina%20Zayed%20-%20Abu%20Dhabi%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2s!4v1729412719419!5m2!1sen!2s" 
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form action="" class="">
                                <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name">
                                <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email">
                                <textarea class="w-100 form-control border-0 mb-4" rows="11" cols="10" placeholder="Your Message"></textarea>
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-2">UAE, Abo Dhabi, Al Janal Market, Port Zayed, Shop No.37</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Contact Us</h4>
                                    <div class="d-flex mb-2" style="align-items: center">
                                        <i class="fas fa-envelope me-2"></i>
                                        <p class="mb-0">info@re-posts.com</p>
                                    </div>
                                    <div class="d-flex mb-2" style="align-items: center">
                                        <i class="bi-whatsapp me-2"></i>
                                        <p class="mb-0">+971 52 562 225</p>
                                    </div>
                                    <div class="d-flex mb-2" style="align-items: center">
                                        <i class="bi bi-telephone me-2"></i>
                                        <p class="mb-0">+971 26 732 311</p>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="bi bi-clock fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Working Hours</h4>
                                    <p class="mb-0">from Monday to Friday</p>
                                    <p>5:00 AM - 9:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

@endsection