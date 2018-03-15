<?php

namespace App\Http\Controllers;

use App\Communication;
use App\Basket;
use App\Area;
use App\Ask;
use App\Audience;
use App\Medium;
use App\User;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $communications = Communication::all();

        return view('communication/index', ['communications' => $communications, 'title' => 'Communications']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calendar()
    {

        $communications = Communication::all();
        return view('communication/calendar', ['communications' => $communications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $baskets = Basket::with(['areas' => function ($q) {
            $q->orderBy('label', 'asc');
        }])->get()->sortBy('label');

        $areas = Area::with(['subAreas' => function ($q) {
            $q->orderBy('label', 'asc');
        }])->get();

        $initialAreas = $baskets->first()->areas->sortBy('label');
        $initialsubAreas = $initialAreas->first()->subAreas->sortBy('label');

        $areasByBasket = $baskets->groupBy('label');
        $subAreasByArea = $areas->groupBy('label');

        $asks = Ask::all();
        $audiences = Audience::all();
        $mediums = Medium::all();
        $users = User::all();

        return view('communication/create', [
            'communication' => '',

            'baskets' => $baskets,
            'areas' => $initialAreas,
            'subAreas' => $initialsubAreas,

            'areasByBasket' => $areasByBasket,
            'subAreasByArea' => $subAreasByArea,

            'asks' => $asks,
            'audiences' => $audiences,
            'mediums' => $mediums,
            'users' => $users,

            'title' => 'Create Communication',
        ]);
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
            'title' => 'required|unique:communications|max:255',
            'description' => 'required',
            'basket' => 'required',
            'area' => 'required',
            'subarea' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'user_id' => 'required',
            'audiences' => 'required',
        ]);

        $communication = new Communication();

        $communication->title = $request->title;
        $communication->description = $request->description;

        $communication->basket_id = $request->basket;
        $communication->area_id = $request->area;
        $communication->sub_area_id = $request->subarea;

        $communication->medium_id = $request->medium_id;
        $communication->ask_id = $request->ask_id;

        $communication->start_date = $request->start_date;
        $communication->end_date = $request->end_date;
        $communication->date_flexibility = $request->date_flexibility;

        $communication->approx_recipients = $request->approx_recipients;
        $communication->data_selection = $request->data_selection;
        $communication->notes = $request->notes;

        $communication->user_id = $request->user_id;

        $communication->save();

        $communication->audiences()->sync($request->audiences);

        $communication->bsd_tag = "{$communication->basket->label},{$communication->area->label},{$communication->subArea->label},{$communication->ask->label}";
        foreach ($communication->audiences as $audience) {
            $communication->bsd_tag .= ',' . $audience->label;
        }

        $communication->save();

        $trello = new \App\ServicesComms\Trello();
        $html = $this->createTrelloDescription($communication);
        $res = $trello->createCard($communication->basket->label . ' - ' . $communication->title, $html, $communication->start_date);

        $trelloCard = new \App\TrelloCard(['card_id' => $res->id]);
        $trelloCard->save();
        $communication->trello_card_id = $trelloCard->id;
        $communication->save();

        return redirect()->action('CommunicationController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Communication $communication
     * @return \Illuminate\Http\Response
     */
    public function show(Communication $communication)
    {
        $rows = [
            ['key' => 'Title','value' => $communication->title],
            ['key' => 'Description','value' => $communication->description],
            ['key' => 'Basket','value' => $communication->basket->label],
            ['key' => 'Area','value' => $communication->area->label],
            ['key' => 'Sub Area','value' => $communication->subArea->label],
            ['key' => 'Medium','value' => $communication->medium->label],
            ['key' => 'Ask','value' => $communication->ask->label],
            ['key' => 'Start Date','value' => $communication->start_date],
            ['key' => 'End Date','value' => $communication->end_date],
            ['key' => 'Date Flexibility','value' => $communication->date_flexibility],
            ['key' => 'Approx. Recipients','value' => $communication->approx_recipients],
            ['key' => 'Notes','value' => $communication->notes],
            ['key' => 'BSD Tag','value' => $communication->bsd_tag],
            ['key' => 'User Id','value' => $communication->user_id],
            ['key' => 'Created Date','value' => $communication->created_at],
            ['key' => 'Updated Date','value' => $communication->updated_at],
        ];

        return view('communication/show', [
            'title' => 'View Communication',
            'rows' => $rows,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Communication $communication
     * @return \Illuminate\Http\Response
     */
    public function replicate(Communication $communication)
    {
        $baskets = Basket::with(['areas' => function ($q) {
            $q->orderBy('label', 'asc');
        }])->get()->sortBy('label');

        $areas = Area::with(['subAreas' => function ($q) {
            $q->orderBy('label', 'asc');
        }])->get();

        $initialAreas = $communication->basket->areas->sortBy('label');
        $initialsubAreas = $communication->area->subAreas->sortBy('label');

        $areasByBasket = $baskets->groupBy('label');
        $subAreasByArea = $areas->groupBy('label');

        $asks = Ask::all();
        $audiences = Audience::all();
        $mediums = Medium::all();
        $users = User::all();

        $communication->user_id = auth()->user()->id;
        $communication->title = $communication->title . ' - COPY - ' . time();

        return view('communication/create', [
            'communication' => $communication,

            'baskets' => $baskets,
            'areas' => $initialAreas,
            'subAreas' => $initialsubAreas,

            'areasByBasket' => $areasByBasket,
            'subAreasByArea' => $subAreasByArea,

            'asks' => $asks,
            'audiences' => $audiences,
            'mediums' => $mediums,
            'users' => $users,

            'title' => 'Create Communication',
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Communication $communication
     * @return \Illuminate\Http\Response
     */
    public function edit(Communication $communication)
    {
        $baskets = Basket::with(['areas' => function ($q) {
            $q->orderBy('label', 'asc');
        }])->get()->sortBy('label');

        $areas = Area::with(['subAreas' => function ($q) {
            $q->orderBy('label', 'asc');
        }])->get();

        $initialAreas = $communication->basket->areas->sortBy('label');
        $initialsubAreas = $communication->area->subAreas->sortBy('label');

        $areasByBasket = $baskets->groupBy('label');
        $subAreasByArea = $areas->groupBy('label');

        $asks = Ask::all();
        $audiences = Audience::all();
        $mediums = Medium::all();
        $users = User::all();


        return view('communication/edit', [
            'communication' => $communication,

            'baskets' => $baskets,
            'areas' => $initialAreas,
            'subAreas' => $initialsubAreas,

            'areasByBasket' => $areasByBasket,
            'subAreasByArea' => $subAreasByArea,

            'asks' => $asks,
            'audiences' => $audiences,
            'mediums' => $mediums,
            'users' => $users,

            'title' => 'EditA Communication',
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Communication $communication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Communication $communication)
    {
        $request->validate([
            'title' => 'required|unique:communications,title,' . $communication->id . '|max:255',
            'description' => 'required',
            'basket' => 'required',
            'area' => 'required',
            'subarea' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'user_id' => 'required',
            'audiences' => 'required',
        ]);

        $communication->title = $request->title;
        $communication->description = $request->description;

        $communication->basket_id = $request->basket;
        $communication->area_id = $request->area;
        $communication->sub_area_id = $request->subarea;

        $communication->medium_id = $request->medium_id;
        $communication->ask_id = $request->ask_id;

        $communication->start_date = $request->start_date;
        $communication->end_date = $request->end_date;
        $communication->date_flexibility = $request->date_flexibility;

        $communication->approx_recipients = $request->approx_recipients;
        $communication->data_selection = $request->data_selection;
        $communication->notes = $request->notes;

        // trello_id
        $communication->user_id = $request->user_id;
        // active

        $communication->audiences()->sync($request->audiences);

        $communication->bsd_tag = "{$communication->basket->label},{$communication->area->label},{$communication->subArea->label},{$communication->ask->label}";
        foreach ($communication->audiences as $audience) {
            $communication->bsd_tag .= ',' . $audience->label;
        }

        $communication->save();

        if (isset($communication->trello_card_id)) {
            $trello = new \App\ServicesComms\Trello();
            $html = $this->createTrelloDescription($communication);
            $res = $trello->updateCard($communication->trelloCard->card_id, $communication->basket->label . ' - ' . $communication->title, $html, $communication->start_date);

        }

        return redirect()->action('CommunicationController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Communication $communication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Communication $communication)
    {
        //
    }

    private function createTrelloDescription($communication)
    {
        return view('trello', [
            'email' => $communication->user->email,
            'ask' => $communication->ask->label,
            'audience' => 'xxx',
            'recipients' => $communication->approx_recipients,
            'flexibility' => $communication->date_flexibility,
            'note' => $communication->note,
            'tag' => $communication->bsd_tag,
            'url' => env('APP_URL') . '/communications/' . $communication->id,
            'created' => $communication->created_at,
            'updated' => $communication->updated_at,
        ])->render();
    }
}
