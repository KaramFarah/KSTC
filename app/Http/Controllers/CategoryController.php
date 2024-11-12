<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        $pageTitle = [
            'title' => 'الأصناف',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'جميع الأصناف',
                    'link'  => route('categories.index')
                ],
            ]
        ];

        return view('dashboard.categories.index' , compact('pageTitle' , 'categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        if ($request->hasFile('photo')){
            $category->media()->delete();
            $category->addMedia($request->file('photo'))->toMediaCollection('categories' , 'media');
        }
        return redirect()->route('categories.index')->with(['message' => 'تمت إضافة الصنف بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
                
        $pageTitle = [
            'title' => 'الأصناف',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' =>  'تعديل الصنف' . ' ' . $category->name,
                    'link'  => route('categories.index')
                ],
            ]
        ];

        return view('dashboard.categories.index' , compact('pageTitle' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        if ($request->hasFile('photo')) {

            $category->media()->each(function ($media) {
                $media->delete(); 
            });
            
            $category->addMedia($request->file('photo'))->toMediaCollection('categories', 'media');
        }

        return redirect()->route('categories.index')->with(['info' => __('تم تعديل الصنف بنجاح !')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with(['danger' => __('تم حذف الصنف بنجاح !')]);
    }
}
