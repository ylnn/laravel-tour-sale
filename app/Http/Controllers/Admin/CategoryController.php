<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public $baseRoute = "admin.category";
    public $indexRoute = "admin.category.index";
    public $model = "App\Category";


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

        $records = $query->get();

        $baseRoute = $this->baseRoute;
        
        return view('admin.category.index', compact('records', 'q', 'p', 'o', 'baseRoute'));
    }

    public function create()
    {
        return view($this->baseRoute . '.create', ['baseRoute' => $this->baseRoute]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'boolean|required',
            'name' => 'string|required|unique:categories,name',
            'slug' => 'string|nullable',
            'description' => 'string|nullable',
        ]);

        $record = new Category();
        $record->name = $request->name;
        $record->status = $request->status;
        $record->description = $request->description;
        $record->setSlug($request->slug);
        $record->save();

        showMessage(trans('adminLang.saved'), 'success');

        return !empty(request('previous')) ? redirect(request('previous')) : redirect()->route($this->indexRoute);
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $baseRoute = $this->baseRoute;
        return view('admin.category.edit', compact('category', 'baseRoute'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'status' => 'boolean|required',
            'name' => 'string|required',
            'slug' => 'string|nullable',
            'description' => 'string|nullable',
        ]);

        $category->name = $request->name;
        $category->status = $request->status;
        $category->description = $request->description;
        $category->setSlug($request->slug);
        $category->save();

        showMessage(trans('adminLang.saved'), 'success');

        return !empty(request('previous')) ? redirect(request('previous')) : redirect()->route($this->indexRoute);
    }
    
    public function destroy(Request $request, Category $category)
    {
        if($category->delete()){
            showMessage(trans('adminLang.deleted'), 'success');
        }

        // return !empty(request('previous')) ? redirect(request('previous')) : redirect()->route($this->indexRoute);
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
