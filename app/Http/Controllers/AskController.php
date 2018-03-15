<?php

namespace App\Http\Controllers;

use App\Ask;
use Illuminate\Http\Request;

class AskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asks = Ask::all();
        return view('ask/index', ['asks' => $asks, 'title' => 'Asks']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ask/create', ['ask' => '', 'title' => 'Create Ask']);
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
            'label' => 'required|unique:asks|max:255',
        ]);

        $ask = new Ask;
        $ask->label = $request->label;
        $ask->tag = $request->tag;
        $ask->color_font = $request->color_font;
        $ask->color_background = $request->color_background;
        $ask->save();

        return redirect()->action('AskController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ask $ask
     * @return \Illuminate\Http\Response
     */
    public function show(Ask $ask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ask $ask
     * @return \Illuminate\Http\Response
     */
    public function edit(Ask $ask)
    {
        return view('ask/edit', ['ask' => $ask, 'title' => 'Edit Ask']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Ask $ask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ask $ask)
    {
        $request->validate([
            'label' => 'required|unique:asks,label,' . $ask->id . '|max:255',
        ]);

        $ask->label = $request->label;
        $ask->tag = $request->tag;
        $ask->color_font = $request->color_font;
        $ask->color_background = $request->color_background;
        $ask->save();

        return redirect()->action('AskController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ask $ask
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ask $ask)
    {
        //
    }
}
