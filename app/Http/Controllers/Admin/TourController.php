<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;

class TourController extends Controller
{
    public $baseRoute = "admin.tour";
    public $indexRoute = "admin.tour.index";
    public $model = "App\Tour";

    public function index()
    {
        $q = request('q');
        $p = request('p');
        $o = request('o');

        # start query
        $query = $this->model::whereNotNull('id');

        # order varsa, constraiti(kısıtlamayı) al, yoksa default orderBy'ı uygula.
        $query = $o ? $this->getOrderConstrait($query, $o) : $query->orderBy('created_at', 'DESC');

        # Query parametresi varsa
        $query = $q ? $query->where('name', 'like', '%' . $q . '%') : $query;

        $query->withCount('dates');

        $records = $query->get();

        $baseRoute = $this->baseRoute;
        
        return view('admin.tour.index', compact('records', 'q', 'p', 'o', 'baseRoute'));
    }

    public function create()
    {
        return view($this->baseRoute . '.create', ['baseRoute' => $this->baseRoute]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'boolean|required',
            'name' => 'string|required|unique:tours,name',
            'slug' => 'string|nullable',
            'description' => 'string|nullable',
            'summary' => 'string|nullable',
        ]);

        $record = new Tour();
        $record->name = $request->name;
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

    protected function getOrderConstrait($query, $o)
    {
        switch ($o) {
            case 10:
                $query->orderBy('name', 'desc');
                break;
            case 11:
                $query->orderBy('name', 'asc');
                break;
            case 20:
                $query->orderBy('created_at', 'desc');
                break;
            case 21:
                $query->orderBy('created_at', 'asc');
                break;
            case 30:
                $query->orderBy('updated_at', 'desc');
                break;
            case 31:
                $query->orderBy('updated_at', 'asc');
                break;
            case 40:
                $query->orderBy('status', 'desc');
                break;
            case 41:
                $query->orderBy('status', 'asc');
                break;

            default: // Default Order
            $query->orderBy('created_at', 'desc');
            break;
        }
        return $query;
    }
}
