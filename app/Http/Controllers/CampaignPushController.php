<?php

namespace App\Http\Controllers;

use App\SubArea;
use App\CampaignPush;
use Illuminate\Http\Request;

class CampaignPushController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaignPushes = CampaignPush::where('active', 1)->get();

        return view('campaignpush/index', ['campaignPushes' => $campaignPushes, 'title' => 'Pushes']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subAreas = SubArea::where('active', 1)
            ->where('label', '!=', 'N/A')
            ->get();

        return view('campaignpush/create', ['campaignPush' => '', 'subAreas' => $subAreas, 'title' => 'Create Push']);
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
            'label' => 'required|unique:campaign_pushes|max:255',
            'subArea' => 'required',
        ]);

        $campaignPush = new CampaignPush;
        $campaignPush->label = $request->label;
        $campaignPush->sub_area_id = $request->subArea;
        $campaignPush->tag = $request->tag;
        $campaignPush->save();


        return redirect()->action('CampaignPushController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CampaignPush $campaignPush
     * @return \Illuminate\Http\Response
     */
    public function show(CampaignPush $campaignPush)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CampaignPush $campaignPush
     * @return \Illuminate\Http\Response
     */
    public function edit(CampaignPush $campaignPush)
    {
        $subAreas = SubArea::where('active', 1)
            ->where('label', '!=', 'N/A')
            ->get();

        return view('campaignpush/edit', ['campaignPush' => $campaignPush, 'subAreas' => $subAreas, 'title' => 'Edit Push']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\CampaignPush $campaignPush
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CampaignPush $campaignPush)
    {
        $request->validate([
            'label' => 'required|unique:campaign_pushes,label,' . $campaignPush->id . '|max:255',
            'subArea' => 'required',
        ]);

        $campaignPush->label = $request->label;
        $campaignPush->sub_area_id = $request->subArea;
        $campaignPush->tag = $request->tag;

        $campaignPush->save();

        return redirect()->action('CampaignPushController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CampaignPush $campaignPush
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampaignPush $campaignPush)
    {
        $campaignPush->active = 0;
        $campaignPush->save();

        return redirect()->action('CampaignPushController@index');
    }
}
