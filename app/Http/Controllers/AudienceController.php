<?php

namespace App\Http\Controllers;

use App\Audience;
use Illuminate\Http\Request;

class AudienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audiences = Audience::where('active', 1)->get();
        return view('audience/index', ['audiences' => $audiences, 'title' => 'Audiences']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('audience/create', ['audience' => '', 'title' => 'Create Audience']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|unique:audiences|max:255',
        ]);

        $audience = new Audience;
        $audience->label = $request->label;
        $audience->tag = $request->tag;
        $audience->save();

        return redirect()->action('AudienceController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Audience  $audience
     * @return \Illuminate\Http\Response
     */
    public function show(Audience $audience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Audience  $audience
     * @return \Illuminate\Http\Response
     */
    public function edit(Audience $audience)
    {
        return view('audience/edit', ['audience' => $audience, 'title' => 'Edit Audience']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Audience  $audience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audience $audience)
    {
        $request->validate([
            'label' => 'required|unique:audiences,label,' . $audience->id . '|max:255',
        ]);

        $audience->label = $request->label;
        $audience->tag = $request->tag;
        $audience->save();

        return redirect()->action('AudienceController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Audience  $audience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audience $audience)
    {
        $audience->active = 0;
        $audience->save();

        return redirect()->action('AudienceController@index');
    }
}
