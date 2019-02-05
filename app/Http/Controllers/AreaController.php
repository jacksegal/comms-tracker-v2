<?php

namespace App\Http\Controllers;

use App\Area;
use App\Basket;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::where('active', 1)->get();

        return view('area/index', ['areas' => $areas, 'title' => 'Areas']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $baskets = Basket::all();

        return view('area/create', ['area' => '', 'baskets' => $baskets, 'title' => 'Create Area']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|unique:areas|max:255',
            'basket' => 'required',
        ]);

        $area = new Area;
        $area->label = $request->label;
        $area->basket_id = $request->basket;
        $area->tag = $request->tag;
        $area->save();


        return redirect()->action('AreaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $baskets = Basket::all();

        return view('area/edit', ['area' => $area, 'baskets' => $baskets, 'title' => 'Edit Area']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Area $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $request->validate([
            'label' => 'required|unique:areas,label,' . $area->id . '|max:255',
            'basket' => 'required',
        ]);

        $area->label = $request->label;
        $area->basket_id = $request->basket;
        $area->tag = $request->tag;

        $area->save();

        return redirect()->action('AreaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->active = 0;
        $area->save();

        return redirect()->action('AreaController@index');
    }
}
