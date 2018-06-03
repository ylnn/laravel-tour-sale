<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use App\Category;
use App\Photo;
use Validator;
use Illuminate\Validation\Rule;

class TourController extends Controller
{
    public $baseRoute = "admin.tour";
    public $indexRoute = "admin.tour.index";
    public $model = "App\Tour";

    public function index()
    {
        $records = $this->model::withCount('dates')->get();
        $baseRoute = $this->baseRoute;
        return view('admin.tour.index', compact('records', 'q', 'p', 'o', 'baseRoute'));
    }

    public function create()
    {
        // $tour = Tour::create(['status' => 2]);
        $tour = new Tour;
        $tour->status = 2;
        $tour->save();
        return redirect()->route('admin.tour.edit', [$tour]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'boolean|required',
            'name' => 'string|required|unique:tours,name',
            'category_id' => 'integer|required|exists:categories,id',
            'slug' => 'string|nullable',
            'description' => 'string|nullable',
            'summary' => 'string|nullable',
        ]);

        $record = new Tour();
        $record->name = $request->name;
        $record->category_id = $request->category_id;
        $record->status = $request->status;
        $record->description = $request->description;
        $record->summary = $request->summary;
        $record->setSlug($request->slug);
        $record->save();

        showMessage(trans('adminLang.saved'), 'success');

        return !empty(request('previous')) ? redirect(request('previous')) : redirect()->route($this->indexRoute);
    }

    public function show(Tour $tour)
    {
        return view('admin.tour.show', ['record' => $tour, 'baseRoute' => $this->baseRoute]);
    }

    public function edit(Tour $tour)
    {
        $baseRoute = $this->baseRoute;
        return view('admin.tour.edit', compact('tour', 'baseRoute'));
    }

    public function update(Request $request, Tour $tour)
    {
        $this->validate($request, [
            'status' => 'boolean|required',
            'name' => 'string|required',
            'slug' => 'string|nullable',
            'description' => 'string|nullable',
            'summary' => 'string|nullable',
        ]);

        $tour->name = $request->name;
        $tour->status = $request->status;
        $tour->category_id = $request->category_id;
        $tour->description = $request->description;
        $tour->summary = $request->summary;
        $tour->setSlug($request->slug);
        $tour->save();

        showMessage(trans('adminLang.saved'), 'success');

        return !empty(request('previous')) ? redirect(request('previous')) : redirect()->route($this->indexRoute);
    }
    
    public function destroy(Request $request, Tour $tour)
    {
        if ($tour->delete()) {
            showMessage(trans('adminLang.deleted'), 'success');
        }

        return back();
    }


    //photos

    public function getPhotos(Tour $tour)
    {
        $photos = $tour->photos()->get();
        if ($photos->isEmpty()) {
            return response()->json('', 201);
        }

        return $photos;
    }
    public function storePhoto(Request $request)
    {
        $validator = $this->storePhotoValidator($request);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 403);
        }

        $tour = Tour::findOrFail($request['id']);

        $photoController = new PhotoController;
        $upload = $photoController->upload($request, 'tour_images');

        if (!$upload) {
            return response()->json('photo controller error', 403);
        }

        $photo = Photo::find($upload);
        $tour->photos()->save($photo);
        return response()->json('ok', 200);
    }

    public function deletePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:photos,id|exists:photo_tour,photo_id',
            'content_id' => 'required|integer|exists:tours,id'
        ]);

        if($validator->fails()){
            return response()->json('validation error', 403);
        }

        $tour = Tour::find($request['content_id']);
        $tour->photos()->detach($request['id']);

        return response()->json('ok', 200);
        
    }

    public function getLangForVue(Request $request)
    {
        $vueLang = [
            'upload' => trans('adminLang.upload'),
            'refresh' => trans('adminLang.refresh'),
            'sil' => trans('adminLang.delete'),
            'select-photo' => trans('adminLang.select-photo'),
            'once-select-photo' => trans('adminLang.once-select-photo'),
            'uploading' => trans('adminLang.uploading'),
            'uploaded' => trans('adminLang.uploaded'),
            'error-occurred' => trans('adminLang.error-occurred'),
            'deleted' => trans('adminLang.deleted'),
        ];

        return response()->json($vueLang, 200);
    }

    protected function storePhotoValidator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => [
                'required',
                Rule::dimensions()->maxWidth(3000)->maxHeight(2000)
            ],
            'id' => 'required|integer'
        ]);

        return $validator;
    }
}
