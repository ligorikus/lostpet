<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(ImageRequest $request)
    {
        $file = $request->file('image');

        $filename = hash('md5', $file->getClientOriginalName());
        $extension = $file->getClientOriginalExtension();
        $filename = $filename.time().'.'.$extension;
        $destinationPath = storage_path('app/uploads/images');

        $file = $file->move($destinationPath, $filename);
        return Image::create(['path' => $file->getPath().'/'.$filename]);
    }
}
