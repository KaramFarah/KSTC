<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Binafy\LaravelCart\Models\Cart;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $pageTitle = [
            'title' => 'الطلبات',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'الطلبات',
                    'link'  => route('orders.index')
                ]
            ]
        ];
        return view('dashboard.orders.index' , compact('orders' , 'pageTitle'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        abort_if(!auth()->user()->isAdmin, Response::HTTP_FORBIDDEN, '403 Forbidden');
        $input = $request->all();
        $items = Cart::findOrFail($input['content'])->items()->get();
        $content = [];
        foreach($items as $item){
            array_push($content ,
             [
                'item' => $item->itemable ,
                'quantity' => $item->quantity,
                'pricePerUnit' => $item->itemable->getPrice(),
                'totalCost' => number_format($item->itemable->getPrice() * $item->quantity , 2),
            ]);
        }
        $content = json_encode($content);
        $input['content'] = $content;

        Order::create($input);
        return response()->json([
            'message' => 'Saved Successfully'
        ]);
    }

    public function show(Order $order)
    {
        
        $pageTitle = [
            'title' => 'معلومات الطلب',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'الطلبات',
                    'link'  => route('orders.index')
                ],
                [
                    'title' => 'الطلب رقم ' . request()->index,
                    'link' => ''
                ]
            ]
        ];
        $content = json_decode($order->content);
        return view('dashboard.orders.show' , compact('order','content' , 'pageTitle'));
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->with(['danger' => 'تم حذف المنتج بنجاح']);
    }
}
