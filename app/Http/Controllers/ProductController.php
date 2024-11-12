<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\services\MediaSavingService;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $x = request()->category;
        $search = request()->search;
        $query = Product::with('category');

        $query->when($x , function($q) use ($x){
            $q->whereRelation('category' , 'id' , request()->category);
        });
        $query->when($search , function($q) use ($search){
            $q->where('name' , 'like' , "%$search%");
        });

        $products = $query->paginate(10)->appends([
            'category' => $x,
            'search' => $search
        ]);

        $categories = Category::all();
        $priceTypes = Product::priceTypes();
        
        $pageTitle = [
            'title' => 'المنتجات',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'جميع المنتجات',
                    'link'  => route('products.index')
                ],
            ]
        ];
        return view('dashboard.products.index' , compact( 'priceTypes', 'pageTitle' , 'products' , 'categories'));
    }


    public function create()
    {
        //
    }

    public function store(ProductRequest $request , MediaSavingService $savingService)
    {
        $product = product::create($request->all());

        if ($request->hasFile('photo')) {

            $product->media()->each(function ($media) {
                $media->delete(); 
            });
            
            $product->addMedia($request->file('photo'))->toMediaCollection('main_photo', 'media');
        }

        return redirect()->route('products.index')->with(['message' => 'تمت إضافة المنتج بنجاح']);
    }


    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $priceTypes = Product::priceTypes();
        $pageTitle = [
            'title' => 'الأصناف',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' =>  'تعديل المنتج' . ' ' . $product->id,
                    'link'  => route('products.index')
                ],
            ]
        ];

        return view('dashboard.products.index' , compact('pageTitle' , 'product' , 'categories' , 'priceTypes'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        if ($request->hasFile('photo')) {
            
            $product->media()->each(function ($media) {
                $media->delete(); 
            });
            
            $product->addMedia($request->file('photo'))->toMediaCollection('main_photo', 'media');
        }
        
        return redirect()->route('products.index')->with(['info' => __('تم تعديل المنتج بنجاح !')]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        
        return back()->with(['danger' => __('تم حذف القطعة بنجاح !')]);
    }
}
