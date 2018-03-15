<?php

namespace App\Http\Controllers;

use App\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baskets = Basket::all();
        return view('basket/index', ['baskets' => $baskets, 'title' => 'Baskets']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basket/create', ['basket' => '', 'title' => 'Create Basket']);
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
            'label' => 'required|unique:roles|max:255',
        ]);

        $basket = new Basket;
        $basket->label = $request->label;
        $basket->save();

        return redirect()->action('BasketController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Basket $basket
     * @return \Illuminate\Http\Response
     */
    public function show(Basket $basket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Basket $basket
     * @return \Illuminate\Http\Response
     */
    public function edit(Basket $basket)
    {
        return view('basket/edit', ['basket' => $basket, 'title' => 'Edit Basket']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Basket $basket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basket $basket)
    {
        $request->validate([
            'label' => 'required|unique:baskets,label,' . $basket->id . '|max:255',
        ]);

        $basket->label = $request->label;
        $basket->save();

        return redirect()->action('BasketController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Basket $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basket $basket)
    {
        //
    }
}
