<?php

use App\Models\Admin\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MyMediaController;




Route::get('/', function () {
    return redirect()->route('website.home');
});


Route::prefix('admin')->middleware(['auth'])->group(function () {
    // meida routes
    Route::post('media-store', [MyMediaController::class , 'storeMedia'])->name('storeMedia');
    Route::delete('media-store', [MyMediaController::class , 'deleteMedia'])->name('deleteMedia');

    //Dashboard
    Route::view('dashboard-home' , 'dashboard.index')->name('dashboard.home');
    
    Route::resource('slider', 'App\Http\Controllers\SliderController');
    Route::resource('categories', 'App\Http\Controllers\CategoryController');
    Route::resource('products', 'App\Http\Controllers\ProductController');


    Route::get('user-profile' , function(){

        return view('dashboard.users-profile')->with(
            ['email' => auth()->user()->email]
        );
    })->name('user-profile');

    // Users
    Route::delete('users/destroy', 'App\Http\Controllers\UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'App\Http\Controllers\UsersController');

    // Permissions
    Route::delete('permissions/destroy', 'App\Http\Controllers\PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'App\Http\Controllers\PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'App\Http\Controllers\RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'App\Http\Controllers\RolesController');

});


Route::prefix('website')->group(function () {
    Route::view('website-about', 'website.about')->name('website.about');
    Route::get('website-contact' , function(){
        return view('website.contact');
    })->name('website.contact');

    Route::get('website-home', function(){
        $vegetables = Product::whereRelation('category' , 'id' , 1)->orderBy('created_at' , 'DESC')->limit(6)->get();
        $fruites = Product::whereRelation('category' , 'id' , 2)->orderBy('created_at' , 'DESC')->limit(6)->get();
        $preCut = Product::whereRelation('category' , 'id' , 3)->orderBy('created_at' , 'DESC')->limit(6)->get();
        $prePacked = Product::whereRelation('category' , 'id' , 4)->orderBy('created_at' , 'DESC')->limit(6)->get();
        return view('website/index' ,compact('vegetables' , 'fruites' , 'preCut' , 'prePacked'));
    })->name('website.home');
    
    Route::get('products' , function(){

        $x = request()->category;

        $query = Product::with('category');

        $query->when($x , function($q) use ($x){
            $q->whereRelation('category' , 'id' , request()->category);
        });
        $products = $query->paginate(9)->appends([
            'category' => request()->category
        ]);

        return view('website/fruites' , compact('products'));

    })->name('website.products');

    Route::get('cart' , [CartController::class , 'index'])->name('cart.index');
    Route::get('cart-add/{product}' , [CartController::class , 'addToCart'])->name('cart.add');
    Route::get('cart-remove/{cartItem}' , [CartController::class , 'remove'])->name('cart.remove');
    Route::get('cart-item-increment/{product}' , [CartController::class , 'quantityInc'])->name('cart.item.increment');
    Route::get('cart-item-decrement/{cartItem}' , [CartController::class , 'quantityDec'])->name('cart.item.decrement');
    
    Route::get('cart-empty' , [CartController::class , 'emptyCart'])->name('cart.empty');
    Route::get('cart-show' , [CartController::class , 'show'])->name('cart.show');
    
    
    // Route::post('cart')
    Route::get('orders', [OrderController::class , 'index'])->name('orders.index');
    Route::get('orders/show/{order}', [OrderController::class , 'show'])->name('orders.show');
    Route::post('place-order' , [OrderController::class , 'store'])->name('orders.store');
    Route::delete('order-destroy/{order}' , [OrderController::class , 'destroy'])->name('orders.destroy');
});


Auth::routes();
