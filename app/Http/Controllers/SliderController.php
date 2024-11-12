<?php

namespace App\Http\Controllers;

use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $pageTitle = [
            'title' => 'السلايدر',
            'bread_crumbs' => [
                [
                    'title' => 'الرئيسية',
                    'link'  => route('dashboard.home')
                ],
                [
                    'title' => 'السلايدر',
                    'link'  => route('slider.index')
                ],
            ]
        ];
        return view('dashboard.slider' , compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        // 
        $request->validate([
            'slide1' => 'nullable|image|mimes:jpg,png|max:2048',
            'slide2' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);
        // dd($request->slide2);
        if($request->has('slide1')){

            $existingImagePath1 = public_path('assets/frontend/img/hero-img-1.jpg');

            if (File::exists($existingImagePath1)) {

                File::delete($existingImagePath1);

            }
            $image = $request->file('slide1');

            $imageName = 'hero-img-1.jpg'; 

            $image->move(public_path('assets/frontend/img'), $imageName);
        }

        if($request->has('slide2')){

            $existingImagePath2 = public_path('assets/frontend/img/hero-img-2.jpg');

            if (File::exists($existingImagePath2)) {

                File::delete($existingImagePath2);

            }
            $image = $request->file('slide2');

            $imageName = 'hero-img-2.jpg'; 

            $image->move(public_path('assets/frontend/img'), $imageName);
        }

        return redirect()->back()->with(['success' => 'تم تعديل الصورة بنجاح']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
