<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyMediaController extends Controller
{
    public function storeMedia(Request $request)
    { 
        // Validates file size
        if ($request->has('size')) {
            $request->validate([
                'file' => 'max:' . ($request->input('size') * 1024),
            ]);
        }
        // If width or height is preset, we are validating it as an image
        if ($request->has('width') || $request->has('height')) {
            $request->validate([
                'file' => sprintf(
                    'image|dimensions:max_width=%d,max_height=%d',
                    $request->input('width', 100000),
                    $request->input('height', 100000)
                ),
            ]);
        }

        $path = storage_path('tmp/uploads');

        try {
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
        } catch (\Exception $e) {
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function deleteMedia(Request $request)
    {
        $path = storage_path('tmp/uploads/') . $request->filename;
        //$path = public_path() . '/images/' . $request->filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $request->filename;
    }
}
