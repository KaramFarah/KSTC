<?php
namespace App\services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Foundation\Http\FormRequest;

class MediaSavingService{

    public function storeMedia(FormRequest $request ,Model $model):void {

        if(isset($request->attached_file)){
            if ($request->input('attached_file', false)) {
                if (!$model->attached_file || $request->input('attached_file') !== $model->attached_file->file_name) {
                    if ($model->attached_file) {
                        $model->attached_file->delete();
                    }
                    $model->addMedia(storage_path('tmp/uploads/' . basename($request->input('attached_file'))))->toMediaCollection('attached_file');
                    Storage::delete(storage_path('tmp/uploads/' . basename($request->input('attached_file'))));
                }
            } elseif ($model->attached_file) {
                $model->attached_file->delete();
            }

        }

        if(isset($request->main_photo)){

            if (count($model->mainPhotoArray) > 0) {
                foreach ($model->MainPhotoArray as $media) {
                    if (!in_array($media->file_name, $request->input('main_photo', []))) {
                        $media->delete();
                    }
                }
            }
            $media = $model->MainPhotoArray->pluck('file_name')->toArray();
            foreach ($request->input('main_photo', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $model->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('main_photo');
                    Storage::delete(storage_path('tmp/uploads/' . basename($file)));
                }
            }

        }

        if(isset($request->gallery)){
            if (count($model->garllery) > 0) {
                foreach ($model->garllery as $media) {
                    
                    if (!in_array($media->file_name, $request->input('garllery', []))) {
                        $media->delete();
                    }
                }
            }
            $media = $model->garllery->pluck('file_name')->toArray();
            foreach ($request->input('garllery', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $model->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('garllery');
                    Storage::delete(storage_path('tmp/uploads/' . basename($file)));
                }
            }
        }

        
    }
}