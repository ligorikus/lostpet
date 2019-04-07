<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('image');

        $filename = hash('md5', $file->getClientOriginalName());
        $extension = $file->getClientOriginalExtension();
        $image = $filename.time().'.'.$extension;
        $destinationPath = storage_path('app/uploads/images');

        $file = $file->move($destinationPath, $image);
        return Image::create(['path' => $file->getPath()]);
    }
}
