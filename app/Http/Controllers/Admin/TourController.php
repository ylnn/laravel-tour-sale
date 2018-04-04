<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use App\Category;

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
        $categories = Category::all();
        return view($this->baseRoute . '.create', ['baseRoute' => $this->baseRoute, 'categories' => $categories]);
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

        showMessage('Kaydedildi', 'success');

        return !empty(request('previous')) ? redirect(request('previous')) : redirect()->route($this->indexRoute);
    }

    public function show(Tour $tour)
    {
        return view('admin.tour.show', compact('tour'));
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
        $tour->description = $request->description;
        $tour->summary = $request->summary;
        $tour->setSlug($request->slug);
        $tour->save();

        showMessage('Kaydedildi', 'success');

        return !empty(request('previous')) ? redirect(request('previous')) : redirect()->route($this->indexRoute);
    }
    
    public function destroy(Request $request, Tour $tour)
    {
        if ($tour->delete()) {
            showMessage('Silindi', 'success');
        }

        return back();
    }

}
