<?php

namespace App\Http\Controllers;

use App\Medium;
use Illuminate\Http\Request;

class MediumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mediums = Medium::all();
        return view('medium/index', ['mediums' => $mediums, 'title' => 'Mediums']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medium/create', ['medium' => '', 'title' => 'Create Medium']);
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
            'label' => 'required|unique:media|max:255',
        ]);

        $medium = new Medium;
        $medium->label = $request->label;
        $medium->save();

        return redirect()->action('MediumController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medium $medium
     * @return \Illuminate\Http\Response
     */
    public function show(Medium $medium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medium $medium
     * @return \Illuminate\Http\Response
     */
    public function edit(Medium $medium)
    {
        return view('medium/edit', ['medium' => $medium, 'title' => 'Edit Medium']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Medium $medium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medium $medium)
    {
        $request->validate([
            'label' => 'required|unique:media,label,' . $medium->id . '|max:255',
        ]);

        $medium->label = $request->label;
        $medium->save();

        return redirect()->action('MediumController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medium $medium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medium $medium)
    {
        //
    }
}
