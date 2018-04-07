<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use App\Photo;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class PhotoController extends Controller
{
    public function form()
    {
       return view('admin.form');
    }
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => [
                'required',
                Rule::dimensions()->maxWidth(3000)->maxHeight(2000),
            ],
        ]);

        if($validator->fails()) {
            return response()->json('validation error');
        }

        $photo = $request['file'];

        $photoOrginalName = $photo->getClientOriginalName();
        $photoExt = $photo->getClientOriginalExtension();
        $photoRealPath = $photo->getRealPath();

        $random = str_random(40);
        $filename = $random . '.' . $photoExt;
        $filename_thumb = $random . '_thumb.' . $photoExt;

        $path = 'public/tour_images/' . $filename;
        $path_thumb = 'public/tour_images/' . $filename_thumb;

        $image = Image::make($photoRealPath)->fit(700, 400, function ($constraint) {
            $constraint->upsize();
        });

        $storedFile = Storage::put($path, (string) $image->encode());


        // Thumb Start
        $image_thumb = Image::make($photoRealPath)->fit(300, null, function ($constraint) {
            $constraint->upsize();
        });
        $storedFile_thumb = Storage::put($path_thumb, (string) $image_thumb->encode());

        $photo = new Photo;
        $photo->filename = $path;
        $photo->filename_thumb = $path_thumb;
        $photo->save();

        return 'OK';
    }
}
