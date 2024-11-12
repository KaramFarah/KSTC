<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use Binafy\LaravelCart\Models\Cart;

class CartApiController extends Controller
{
    public function index(){

        abort_if(is_null(auth()->user()), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
        // dd($product->id);
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

        return redirect()->back()->with(['message' => 'Added Successfully']);
    }
    public function remove(CartItem $cartItem){
        
        $cart = Cart::query()->firstOrCreate(['user_id' => auth()->user()->id]);
        $cart->removeItem($cartItem);
        // dd($cart->items);

        return redirect()->back();
    }
    public function emptyCart(){
        
        $cart = Cart::query()->firstOrCreate(['user_id' => auth()->user()->id]);
        $cart->emptyCart();

        return redirect()->back();
    }

    public function quantityInc(Product $product , int $amount = 1){
        dd('we here');
        $cart = Cart::query()->firstOrCreate(['user_id' => auth()->user()->id]);
        $cart->increaseQuantity($product, $amount);
        
        return response()
        ->json([
            'success' => 'Added Successfully'
        ]);
    }    
    public function quantityDec(Product $product , int $amount = 1){

        $cart = Cart::query()->firstOrCreate(['user_id' => auth()->user()->id]);
        
        $cart->decreaseQuantity($product, $amount);
        return response()
        ->json([
            'success' => 'Added Successfully'
        ]);
    } 
}
