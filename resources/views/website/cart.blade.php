@extends('website.website-layouts.app')
@section('content')
{{-- calculatedPriceByQuantity --}}
{{-- {{dd($cart->calculatedPriceByQuantity())}} --}}
        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($cart->items as $item)
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="{{$item->itemable->originalImage}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4">{{$item->itemable->name}}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">AED <span class="product-price">{{$item->itemable->getPrice()}}</span></p> 
                                    </td>
                                    <td>
                                        <div class="input-group quantity mt-4" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button type="submit" route="{{route('cart.item.decrement', ['cartItem' => $item])}}" class="decrement btn btn-sm btn-minus rounded-circle bg-light border" >
                                                <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm text-center border-0" value="{{$item->quantity}}">
                                            <div class="input-group-btn">
                                                {{-- <form action="{{route('cart.item.increment' , ['cartItem' => $item])}}" method="get">
                                                    @csrf
                                                </form> --}}
                                                <button route="{{route('cart.item.increment' , ['product' => $item->itemable])}}" type="submit" class="btn btn-sm btn-plus rounded-circle bg-light border increment">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">AED <span class="product-total">{{$item->quantity * $item->itemable->getPrice()}}</span></p> 
                                    </td>
                                    <td>
                                        <button route="{{route('cart.remove' , ['cartItem' => $item])}}" type="submit" class="btn btn-md rounded-circle bg-light border mt-4 removeItem" >
                                            <i class="fa fa-times text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="img/vegetable-item-3.png" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4">Banana</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4 product-price">56.50 </p>
                                    </td>
                                    <td>
                                        <div class="input-group quantity mt-4" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                                <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4 product-total" onclick="getProdutsTotal()">0</p>
                                    </td>
                                    <td>
                                        <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                            <i class="fa fa-times text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="img/vegetable-item-3.png" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4">Banana</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4 product-price">29.00 </p>
                                    </td>
                                    <td>
                                        <div class="input-group quantity mt-4" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                                <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- Total --}}
                                    <td>
                                        <p class="mb-0 mt-4 product-total">0</p>
                                    </td>
                                    <td>
                                        <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                            <i class="fa fa-times text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforelse
                      
                        </tbody>
                    </table>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-7 bg-light rounded pt-4">
                        <form id="orderForm" action="{{route('orders.store')}}" method="POST" class="">
                            @csrf
                            <input required name="name" type="text" class="w-100 form-control border-0 py-3 mb-4" value="{{auth()->user()->name}}" placeholder="Your Name *">
                            <input required name="location" type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Location *   ">
                            <input required name="phone" type="number" class="w-100 form-control border-0 py-3 mb-4" placeholder="00971521562225 *">                            
                            <textarea name="notes" class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Any Notes?"></textarea>
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                            <input type="hidden" name="content" value="{{$cart->id}}">
                        </form>
                    </div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            {{-- <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0">$96.00</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p class="mb-0">Flat rate: $3.00</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end">Shipping to Ukraine.</p>
                            </div> --}}
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                {{-- {{$cart->calculatedPriceByQuantity()}} --}}
                                <p class="mb-0 pe-4">AED <span id="final_total">0</span></p>
                            </div>
                            <button id="orderFormSubmit" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->
@endsection

@push('scripts')
    {{-- product-price --}}
    {{-- product-total --}}
    <script>
        function getProdutsTotal(){
            // getting the prices as HTML array
            let productSum = document.getElementsByClassName('product-total');
            let productTotal = 0;

            // converting this HTML Array to normal array thaat have the methods that we need
            Array.from(productSum).forEach(element => {
                productTotal += parseFloat(element.innerHTML);
            });

            document.getElementById('final_total').innerHTML = productTotal.toFixed(2);
            console.log(productTotal);
        }


        ///////////////////////////////////////////////////////////////////////////////


        // Function to update the total price
        function updateTotalPrice(row) {
            // Select the product price element and convert its text to float
            const priceElement = row.querySelector('.product-price');
            const price = parseFloat(priceElement.innerHTML);

            // Select the input field and convert its value to float
            const quantityInput = row.querySelector('input[type="text"]');
            const quantity = parseFloat(quantityInput.value);

            // Calculate the total
            const total = price * quantity;

            // Update the product total element with the calculated total
            const totalElement = row.querySelector('.product-total');
            totalElement.innerHTML = total.toFixed(2); // Format to 2 decimal places
        }

        // Function to handle quantity change
        function handleQuantityChange(event) {
            const row = event.target.closest('tr'); // Get the closest row
            updateTotalPrice(row); // Update the total price for that row

            getProdutsTotal();
        }

        // Add event listeners to the plus and minus buttons
        document.querySelectorAll('.btn-plus').forEach(button => {
            button.addEventListener('click', handleQuantityChange);
        });

        document.querySelectorAll('.btn-minus').forEach(button => {
            button.addEventListener('click', handleQuantityChange);
        });

        // Initial calculation for all rows on page load, excluding the first row (index 0)
        document.querySelectorAll('tr').forEach((row, index) => {
            if (index > 0) {
                updateTotalPrice(row);
                getProdutsTotal();
            }
        });


        // ajax requests
        $(document).ready(function() {
            $('.increment').on('click', function(e) {
                // e.preventDefault(); // Prevent the default anchor click behavior
        
                var url = $(this).attr('route'); // Get the URL from the href attribute
        
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        // Handle the success response here
                        console.log('Item incremented successfully:', response);
                        // Optionally update the UI or notify the user
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error('Error incrementing item:', error);
                    }
                });
            });
            $('.decrement').on('click', function(e) {
                // e.preventDefault(); // Prevent the default anchor click behavior
        
                var url = $(this).attr('route'); // Get the URL from the href attribute
        
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        // Handle the success response here
                        console.log('Item Decremented successfully:', response);
                        // Optionally update the UI or notify the user
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error('Error Decrementing item:', error);
                    }
                });
            });
            $('.removeItem').on('click', function(e){
                if (confirm("Are You Sure of removing this item?") == true) {
                    url = $(this).attr('route')
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            // Handle the success response here
                            console.log('Item Decremented successfully:', response);
                            $(e.target).closest('tr').remove();
                            let x = parseInt(document.getElementById('cartItemCount').innerHTML);
                            document.getElementById('cartItemCount').innerHTML = x - 1;
                            getProdutsTotal();
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            console.error('Error Decrementing item:', error);
                        }
                    });
                } else {

                }
                
            })
            // orderForm
            $('#orderFormSubmit').on('click', function(e) {
                e.preventDefault(); // Prevent default button action

                // Validate form if necessary (optional)
                if ($('#orderForm')[0].checkValidity()) {
                        // Serialize form data
                        var formData = $('#orderForm').serialize();
                        $.ajax({
                            type: 'POST',
                            url: $('#orderForm').attr('action'), // Use the form's action attribute
                            data: formData,
                            success: function(response) {
                                // Handle success response
                                alert('Order submitted successfully!');
                                console.log(response);
                            },
                            error: function(xhr, status, error) {
                                // Handle error response
                                alert('An error occurred: ' + error);
                                console.log(xhr.responseText);
                            }
                        });
                    }else {
                        // Handle invalid form submission if necessary
                        alert('Please fill out all required fields.');
                    }
            });
        });
    </script>

@endpush