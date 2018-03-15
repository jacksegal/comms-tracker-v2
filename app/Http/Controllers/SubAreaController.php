<?php

namespace App\Http\Controllers;

use App\SubArea;
use App\Area;
use Illuminate\Http\Request;

class SubAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subAreas = SubArea::all()->sortBy('label');

        return view('subarea/index', ['subAreas' => $subAreas, 'title' => 'Sub-Areas']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();

        return view('subarea/create', ['subArea' => '', 'areas' => $areas, 'title' => 'Create Sub-Area']);
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
            'label' => 'required|unique:sub_areas|max:255',
            'area' => 'required',
        ]);

        $subArea = new SubArea;
        $subArea->label = $request->label;
        $subArea->area_id = $request->area;
        $subArea->save();


        return redirect()->action('SubAreaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubArea $subArea
     * @return \Illuminate\Http\Response
     */
    public function show(SubArea $subArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubArea $subArea
     * @return \Illuminate\Http\Response
     */
    public function edit(SubArea $subArea)
    {
        $areas = Area::all();

        return view('subarea/edit', ['subArea' => $subArea, 'areas' => $areas, 'title' => 'Edit Sub-Area']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\SubArea $subArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubArea $subArea)
    {
        $request->validate([
            'label' => 'required|unique:sub_areas,label,' . $subArea->id . '|max:255',
            'area' => 'required',
        ]);

        $subArea->label = $request->label;
        $subArea->area_id = $request->area;

        $subArea->save();

        return redirect()->action('SubAreaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubArea $subArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubArea $subArea)
    {
        //
    }
}
