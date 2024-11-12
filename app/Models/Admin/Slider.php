<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class Slider extends BaseModel
{
    use HasFactory;

    // public function registerMediaConversions(Media $media = null):void
    // {
    //     $this->addMediaConversion('full')
    //          ->crop(Manipulations::CROP_TOP_RIGHT, 820, 550);
    //     $this->addMediaConversion('preview')
    //          ->fit(Manipulations::FIT_FILL, 100, 100);
    //     $this->addMediaConversion('thumb')
    //          ->crop(Manipulations::CROP_TOP_RIGHT, 415, 279);
    //         //  ->crop(Manipulations::CROP_TOP_RIGHT, 820, 550);
    // }


    // public function getThumbImagesAttribute(){
    //     $images = $this->getMedia('blog-photos')->all();
    //     if($images){
    //         return $images;
    //     }
    // }
    // public function getThumbImageAttribute(){
    //     $image = $this->getMedia('blog-photos')->first();
    //     if($image){
    //         return $image->getUrl('thumb');
    //     }
    // }

    // public function getPreviewImageAttribute(){
    //     $image = $this->getMedia('blog-photos')->first();
    //     if($image){
    //         return $image->getUrl('preview');
    //     }
    // }
    
    // public function getFullImageAttribute(){
    //     $image = $this->getMedia('blog-photos')->first();
    //     if($image){
    //         return $image->getUrl('full');
    //     }
    // }
}
