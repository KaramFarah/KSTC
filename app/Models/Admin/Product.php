<?php

namespace App\Models\Admin;

use Spatie\Image\Enums\Fit;
use App\Models\Admin\Category;
use Binafy\LaravelCart\Cartable;
use Spatie\MediaLibrary\HasMedia;
use Binafy\LaravelCart\Models\Cart;
use Spatie\Image\Enums\CropPosition;
use Binafy\LaravelCart\Models\CartItem;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia, Cartable
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = ['photo' , 'main_photo'];
    protected $attributes = [
        'discount' => 0,
    ];

    // protected function casts(): array
    // {
    //     return [
    //         'price' => $this->getPrice(),
    //     ];
    // } 

    public function cartProducts(){
        return $this->morphOne(CartItem::class , 'itemable');
    }

    public function getPrice(): float
    {
        return $this->hasDiscount ? $this->price - (number_format(($this->price * $this->discount) / 100 , 2)) : number_format($this->price , 2);
    }

    public function getHasDiscountAttribute(){
        return isset($this->discount) && $this->discount != 0;
    }

    public function getDiscountPriceAttribute(){

        return $this->hasDiscount ? $this->price - (number_format(($this->price * $this->discount) / 100 , 2)) : 'لا يوجد خصم على هذا المنتج';
    }

    const PRICE_TYPE_PIECE = 1;
    const PRICE_TYPE_PACK = 2;
    const PRICE_TYPE_KG = 3;

    static public function priceTypes(){
        return [
            self::PRICE_TYPE_PIECE => 'Piece',
            self::PRICE_TYPE_PACK => 'Pack',
            self::PRICE_TYPE_KG => 'Kg'
        ];
    }
    public function getPriceTypeAttribute(){
        switch ($this->price_by) {
            case 1: return 'Piece';
            case 2: return 'Pack';
            case 3: return 'Kg';
            
            default:
                return ' - ';
                
        }
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('home-page')
            ->crop(1280, 730, CropPosition::Center)
            // ->fit(Fit::FillMax, 1280, 730)
            ->nonQueued();

        $this->addMediaConversion('category-page')
            // ->fit(Fit::Fill, 1332, 1644)
            // ->crop(1332, 1644, CropPosition::Center)
            // ->fit(Fit::FillMax, 1332, 1644)
            ->fit(Fit::Contain, 1332, 1644) // Maintain aspect ratio
            // ->crop(CropPosition::Center) // Center crop if needed
            ->nonQueued();
        $this->addMediaConversion('preview')->fit(Fit::Crop, 120, 120)->nonQueued();
    }

    public function getOriginalImageAttribute(){
        $image = $this->getMedia('main_photo')->last();
        if($image){
            return $image->getUrl();
        }
        return false;
    }
    public function getCategoryPageImageAttribute(){
        $image = $this->getMedia('main_photo')->last();
        if($image){
            return $image->getUrl('category-page');
        }
        return false;
    }
    public function getHomeProductAttribute(){
        $image = $this->getMedia('main_photo')->last();
        if($image){
            return $image->getUrl('home-page');
        }
        return false;
    }
    public function getMainPhotoArrayAttribute()
    {
        $files = $this->getMedia('main_photo');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
        });
        
        return $files;
    }
    public function getMainPhotoAttribute()
    {
        return $this->getMedia('main_photo')->getUrl('preview')->last();
    }
}
