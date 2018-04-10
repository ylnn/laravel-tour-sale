<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Date;
use App\Tour;

class DateController extends Controller
{
    public $baseRoute = "admin.date";
    public $indexRoute = "admin.date.index";
    public $model = "App\Date";

    public function index(Tour $tour)
    {
        $p = request('p');
        $o = request('o');

        // # orderBy
        // $query = $o ? $this->getOrderConstrait($query, $o) : $query->orderBy('created_at', 'DESC');

        $records = $tour->dates;

        $baseRoute = $this->baseRoute;

        return view('admin.date.index', compact('tour', 'records', 'p', 'o', 'baseRoute'));
    }

    public function create(Tour $tour)
    {
        $baseRoute = $this->baseRoute;
        return view('admin.date.create', compact('tour', 'baseRoute'));
    }

    public function store(Tour $tour, Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'min_participant' => 'required|integer',
            'max_participant' => 'required|integer|min:'.(int)$request->min_participant,
            'price' => 'required|integer',
            'currency' => 'required|in:TRY,USD,EUR',
        ]);

        $date = new Date();
        $date->tour_id = $tour->id;
        $date->user_id = 1; // <<<< DEĞİŞECEK
        $date->start_date = $request->start_date;
        $date->end_date = $request->end_date;
        $date->min_participant = $request->min_participant;
        $date->max_participant = $request->max_participant;
        $date->price = $request->price;
        $date->currency = $request->currency;

        $date->save();

        showMessage('Kaydedildi', 'success');

        return !empty(request('previous')) ? redirect(request('previous')) : redirect()->route($this->indexRoute, [$tour->id]);
    }

    public function edit(Date $date)
    {
        $baseRoute = $this->baseRoute;
        return view('admin.date.edit', compact('date', 'baseRoute'));   
    }

    public function update(Date $date, Request $request)
    {
        $this->validate($request, [
            'min_participant' => 'required|integer',
            'max_participant' => 'required|integer|min:'.(int)$request->min_participant,
            'price' => 'required|integer',
            'currency' => 'required|in:TRY,USD,EUR',
        ]);

        $date->min_participant = $request->min_participant;
        $date->max_participant = $request->max_participant;
        $date->price = $request->price;
        $date->currency = $request->currency;

        $date->save();

        showMessage('Kaydedildi', 'success');

        return !empty(request('previous')) ? redirect(request('previous')) : redirect()->route($this->indexRoute, [$date->id]);
    }


    public function show(Request $request, Date $date)
    {
        return view('admin.date.show', compact('date'));   
    }


    public function destroy(Request $request, Date $date)
    {
        if ($date->delete()) {
            showMessage('Silindi', 'success');
        }

        return back();
    }

    
}
