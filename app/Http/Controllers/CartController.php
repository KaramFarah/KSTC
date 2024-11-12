<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use Illuminate\Http\Response;
use Binafy\LaravelCart\Models\Cart;
use Binafy\LaravelCart\Models\CartItem;

class CartController extends Controller
{
    public function index(){

        if(is_null(auth()->user())){
            return redirect()->route('login');
        } 
        // $product = Product::findOrFail(1);
        // Cart::query()->firstOrCreateWithStoreItems(
        //     item: $product,
        //     quantity: 1,
        //     userId: auth()->user()->id
        // );
        
        $cart = Cart::query()->firstOrCreate(['user_id' => auth()->user()->id]);
        // ____________________________________________
        // $product = Product::findOrFail(1);
        // $product2 = Product::findOrFail(2);
        // $items = [
        //     [
        //         'itemable' => $product,
        //         'quantity' => 1
        //     ],
        //     [
        //         'itemable' => $product2,
        //         'quantity' => 1
        //     ],
        // ];
        // $cart->storeItems($items);
        // _____________________________

        // $cartItem = new CartItem([
        //     'itemable_id' => $product->id,
        //     'itemable_type' => Product::class,
        //     'quantity' => 1,
        // ]);
        // $cart->items()->save($cartItem);

        // getting products
        // dd($cart->items->itemable);
        // $cartProducts = Product::whereHas('cartProducts')->get();

        // dd($cart->items[0]->itemable_type::find($cart->items[0]->itemable_id));
        return view('website.cart' , compact('cart'));
    }

    public function addToCart(Product $product){
        if(is_null(auth()->user())){
            return response()
            ->json([
                'login' => false,
            ]);
        } 
        $cart = Cart::query()->firstOrCreate(['user_id' => auth()->user()->id]);
        $buffer = Product::where('id' , $product->id)->wherehas('cartProducts')->count();
        if($buffer){

        }else{
            $cartItem = new CartItem([
                'itemable_id' => $product->id,
                'itemable_type' => Product::class,
                'quantity' => 1,
            ]);
            $cart->items()->save($cartItem);
        }
        return response()
        ->json([
            'success' => 'Added Successfully',
            'count' => $cart->items()->count()
        ]);
        // return redirect()->back()->with(['message' => 'Added Successfully']);
    }
    public function remove(CartItem $cartItem){
        
        $cart = Cart::query()->firstOrCreate(['user_id' => auth()->user()->id]);
        $cart->removeItem($cartItem);
        // dd($cart->items);

        return response()
        ->json([
            'success' => 'Cart Clear Done'
        ]);
    }
    public function emptyCart(){
        
        $cart = Cart::query()->firstOrCreate(['user_id' => auth()->user()->id]);
        $cart->emptyCart();

        return response()
        ->json([
            'success' => 'Cart Clear Done'
        ]);
    }
    public function quantityInc(Product $product , int $amount = 1){

        $cart = Cart::query()->firstOrCreate(['user_id' => auth()->user()->id]);
        $cart->increaseQuantity($product, $amount);
        
        return response()
        ->json([
            'success' => 'Added Successfully'
        ]);
    }    
    public function quantityDec(CartItem $cartItem , int $amount = 1){
        $cart = Cart::query()->firstOrCreate(['user_id' => auth()->user()->id]);
        
        $cart->decreaseQuantity($cartItem, $amount);
        // dd('we here');
        return response()
        ->json([
            'success' => 'Added Successfully'
        ]);
    }

}
