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
    public $photoSizes = ['width' => 700, 'height' => 400]; // width, height
    public $thumbSizes = ['width' => 325, 'height' => 200]; // width, height

    protected $mainFolder = 'public/';

    public function form()
    {
       return view('admin.form');
    }
    public function upload(Request $request, $folder = 'tour_images')
    {
        if($this->validator($request)->fails()) {
            // return response()->json('validation error', 403);
            return false;
        }

        $paths = $this->getPathImage($request);

        list($filename, $filename_thumb, $photoRealPath) = $paths;

        //set image storage folder
        $path = $folder . '/' . $filename;
        $path_thumb = $folder . '/' . $filename_thumb;


        if(!$this->makeAndStoreImage($photoRealPath, $path)){
            return false;
        }

        if(!$this->makeAndStoreImageThumb($photoRealPath, $path_thumb)){
            return false;
        }

        $photo = $this->savePhotoToDB($path, $path_thumb);
        if(!$photo){
            return false;
        }
        return $photo->id;
    }

    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'photo' => [
                'required',
                Rule::dimensions()->maxWidth(3000)->maxHeight(2000),
            ],
        ]);
    }

    protected function makeAndStoreImage($photoRealPath, $path)
    {
        //make image
        $image = Image::make($photoRealPath)->fit($this->photoSizes['width'], $this->photoSizes['height'], function ($constraint) {
            $constraint->upsize();
        });
        if(!$image){
            return false;
        }
        //store image
        $storedFile = Storage::put($this->mainFolder . $path, (string)$image->encode());
        if(!$storedFile){
            return false;
        }
        return true;
    }

    protected function makeAndStoreImageThumb($photoRealPath, $path_thumb)
    {
        // make thumb image
        $image_thumb = Image::make($photoRealPath)->fit($this->thumbSizes['width'], $this->thumbSizes['height'], function ($constraint) {
            $constraint->upsize();
        });

        if(!$image_thumb) {
            return false;
        }

        //store thumb image
        $storedFile_thumb = Storage::put($this->mainFolder . $path_thumb, (string) $image_thumb->encode());

        if(!$storedFile_thumb) {
            return false;
        }

        return true;
    }

    protected function getPathImage($request)
    {
        //file        
        $photo = $request['photo'];

        //get file details
        $photoOrginalName = $photo->getClientOriginalName();
        $photoExt = $photo->getClientOriginalExtension();
        $photoRealPath = $photo->getRealPath();

        //make filename with random

        $random = str_random(40);
        $filename = $random . '.' . $photoExt;
        $filename_thumb = $random . '_thumb.' . $photoExt;

        return array($filename, $filename_thumb, $photoRealPath);

    }

    protected function savePhotoToDB($path, $path_thumb)
    {
        $photo = new Photo;
        $photo->filename = $path;
        $photo->filename_thumb = $path_thumb;

        if(!$photo->save()){
            return false;
        }

        return $photo;
    }

}
