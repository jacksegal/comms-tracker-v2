<?php

namespace App\Http\Controllers;

use App\Communication;
use App\Basket;
use App\Area;
use App\SubArea;
use App\Ask;
use App\Audience;
use App\Medium;
use App\User;
use Illuminate\Http\Request;
use Session;
use Mailgun\Mailgun;


class CommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $communications = Communication::where('active', 1)->get();

        return view('communication/index', ['communications' => $communications, 'title' => 'Communications']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calendar()
    {

        $communications = Communication::where('active', 1)->get();
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

        $initialAreas = Area::where('active', 1)->get();
        $initialsubAreas = SubArea::where('active', 1)->get();

        //$initialAreas = $baskets->first()->areas->sortBy('label');
        //$initialsubAreas = $initialAreas->first()->subAreas->sortBy('label');

        $areasByBasket = $baskets->groupBy('label');
        $subAreasByArea = $areas->groupBy('label');

        $asks = Ask::where('active', 1)->get();
        $audiences = Audience::where('active', 1)->get();
        $mediums = Medium::where('active', 1)->get();
        $users = User::where('active', 1)->get();

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

        /* core validation rules for all medium */
        $validationRules = [
            'title' => 'required|unique:communications|max:255',
            'description' => 'required',
            'basket' => 'required',
            'area' => 'required',
            'subarea' => 'required',
            'ask_id' => 'required',
            'audiences' => 'required',
            'push' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'user_id' => 'required',
        ];

        $request->validate($validationRules);

        $communication = new Communication();

        $communication->title = $request->title;
        $communication->description = $request->description;

        $communication->basket_id = $request->basket;
        $communication->area_id = $request->area;
        $communication->sub_area_id = $request->subarea;
        $communication->push = $request->push;

        $communication->medium_id = $request->medium_id;
        $communication->ask_id = $request->ask_id;

        $communication->start_date = $request->start_date;
        $communication->end_date = $request->end_date;
        $communication->date_flexibility = $request->date_flexibility;

        $communication->alt_ask = $request->alt_ask;
        $communication->reminder = $request->reminder;
        $communication->sample = $request->sample;

        $communication->approx_recipients = $request->approx_recipients;
        $communication->data_selection = $request->data_selection;
        $communication->notes = $request->notes;

        $communication->user_id = $request->user_id;

        $communication->save();

        $communication->audiences()->sync($request->audiences);

        $bsdTag = [
            'basket' => isset($communication->basket->tag) ? $communication->basket->tag : $communication->basket->label,
            'area' => isset($communication->area->tag) ? $communication->area->tag : $communication->area->label,
            'subArea' => isset($communication->subArea->tag) ? $communication->subArea->tag : $communication->subArea->label,
            'ask' => isset($communication->ask->tag) ? $communication->ask->tag : $communication->ask->label,
        ];

        if( $bsdTag['subArea'] == 'NA' ) {
            $bsdTag['subArea'] = '';
        }

        foreach ($communication->audiences as $audience) {
            if(isset($audience->tag)){
                $bsdTag['audience'][] = $audience->tag;
            } else {
                $bsdTag['audience'][] = $audience->label;
            }
        }


        $communication->bsd_tag = "{$bsdTag['basket']},{$bsdTag['area']},{$bsdTag['subArea']},{$bsdTag['ask']}";

        foreach ($bsdTag['audience'] as $audience) {
            $communication->bsd_tag .= ',' . $audience;
        }

        $communication->save();

        if($communication->data_selection == 1){
            // send email
            $mgApi = env('MAILGUN_API', 'forge');
            $mgDomain = env('MAILGUN_DOMAIN', 'forge');

            /* Instantiate the client. */
            $mgClient = new Mailgun($mgApi);
            /* Make the call to the client. */
            $mgClient->sendMessage($mgDomain, array(
                'from' => "Comms Tracker <mailgun@$mgDomain>",
                'to' => env('DATA_EMAIL','jsegal@greenpeace.org'),
                'subject' => 'New Comms requires Data Selection',
                'html' => $this->createDataEmail($communication),
            ));      
        }  

        if($request->medium_id == '1') {
            
            $trello = new \App\ServicesComms\Trello();
            $html = $this->createTrelloDescription($communication);
            $res = $trello->createCard($communication->basket->label . ' - ' . $communication->title, $html, $communication->start_date);

            if($res['code'] == 200) {

                $trelloCard = new \App\TrelloCard(['card_id' => $res['body']->id]);
                $trelloResponse = $trelloCard->save();

                $communication->trello_card_id = $trelloCard->id;
                $communication->save();

                return redirect()->action('CommunicationController@index');    
            } else {

                $errorMsg = 'There was an error adding the card to Trello: ' . $res['body'];
                return redirect()->action('CommunicationController@index')->withErrors($errorMsg);
            }

        } else {
            return redirect()->action('CommunicationController@index');    
        }



        
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
            ['key' => 'Created By','value' => $communication->user->email],
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

        $asks = Ask::where('active', 1)->get();
        $audiences = Audience::where('active', 1)->get();
        $mediums = Medium::where('active', 1)->get();
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

        if(isset($communication->basket)){
            $initialAreas = $communication->basket->areas->sortBy('label');
        } else {
            $initialAreas = Area::where('active', 1)->get();
        }

        if(isset($communication->area)){
            $initialsubAreas = $communication->area->subAreas->sortBy('label');
        } else {
            $initialsubAreas = SubArea::where('active', 1)->get();  
        }

        $areasByBasket = $baskets->groupBy('label');
        $subAreasByArea = $areas->groupBy('label');

        $asks = Ask::where('active', 1)->get();
        $audiences = Audience::where('active', 1)->get();
        $mediums = Medium::where('active', 1)->get();
        $users = User::where('active', 1)->get();


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

            'title' => 'Edit A Communication',
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
        $validationRules = [
            'title' => 'required|unique:communications,title,' . $communication->id . '|max:255',
            'description' => 'required',
            'basket' => 'required',
            'area' => 'required',
            'subarea' => 'required',
            'ask_id' => 'required',
            'audiences' => 'required',
            'push' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'user_id' => 'required',
        ];

        $request->validate($validationRules);

        $communication->title = $request->title;
        $communication->description = $request->description;

        $communication->basket_id = $request->basket;
        $communication->area_id = $request->area;
        $communication->sub_area_id = $request->subarea;
        $communication->push = $request->push;

        $communication->medium_id = $request->medium_id;
        $communication->ask_id = $request->ask_id;

        $communication->start_date = $request->start_date;
        $communication->end_date = $request->end_date;
        $communication->date_flexibility = $request->date_flexibility;

        $communication->alt_ask = $request->alt_ask;
        $communication->reminder = $request->reminder;
        $communication->sample = $request->sample;

        $communication->approx_recipients = $request->approx_recipients;
        $communication->data_selection = $request->data_selection;
        $communication->notes = $request->notes;

        // trello_id
        $communication->user_id = $request->user_id;
        // active

        $communication->audiences()->sync($request->audiences);

        $bsdTag = [
            'basket' => isset($communication->basket->tag) ? $communication->basket->tag : $communication->basket->label,
            'area' => isset($communication->area->tag) ? $communication->area->tag : $communication->area->label,
            'subArea' => isset($communication->subArea->tag) ? $communication->subArea->tag : $communication->subArea->label,
            'ask' => isset($communication->ask->tag) ? $communication->ask->tag : $communication->ask->label,
        ];

        if( $bsdTag['subArea'] == 'NA' ) {
            $bsdTag['subArea'] = '';
        }
    
        foreach ($communication->audiences as $audience) {
            if(isset($audience->tag)){
                $bsdTag['audience'][] = $audience->tag;
            } else {
                $bsdTag['audience'][] = $audience->label;
            }
        }

        $communication->bsd_tag = "{$bsdTag['basket']},{$bsdTag['area']},{$bsdTag['subArea']},{$bsdTag['ask']}";

        foreach ($bsdTag['audience'] as $audience) {
            $communication->bsd_tag .= ',' . $audience;
        }

        /*$communication->bsd_tag = "{$communication->basket->label},{$communication->area->label},{$communication->subArea->label},{$communication->ask->label}";
        foreach ($communication->audiences as $audience) {
            $communication->bsd_tag .= ',' . $audience->label;
        }*/

        $communication->save();

        if (isset($communication->trello_card_id)) {
            $trello = new \App\ServicesComms\Trello();
            $html = $this->createTrelloDescription($communication);
            $res = $trello->updateCard($communication->trelloCard->card_id, $communication->basket->label . ' - ' . $communication->title, $html, $communication->start_date);

            if($res['code'] == 200) {

                return redirect()->action('CommunicationController@index');

            } else {

                $errorMsg = 'There was an error updating Trello: ' . $res['body'];
                return redirect()->action('CommunicationController@index')->withErrors($errorMsg);
            }
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
        $communication->active = 0;
        $communication->save();

        $trello = new \App\ServicesComms\Trello();
        $trelloResponse = $trello->archiveCard($communication->trelloCard->card_id);

        if($trelloResponse['code'] == 200){
            return redirect()->action('CommunicationController@index');
        } else { 
            $errorMsg = 'There was an error updating Trello: ' . $trelloResponse['body'];
            return redirect()->action('CommunicationController@index')->withErrors($errorMsg);
        }

        
    }

    public function trello(Request $request)
    {

        return 'hello world';
    }

    private function createTrelloDescription($communication)
    {
        $i = 2;

        foreach ($communication->audiences as $audience) {
            if($i === 2){
                $audiences = $audience->label;
                $i++;
            } else {
                $audiences .= ', ' . $audience->label;
            }    
        }

        return view('trello', [
            'email' => $communication->user->email,
            'description' => $communication->description,
            'ask' => $communication->ask->label,
            'audience' => $audiences,
            'recipients' => $communication->approx_recipients,
            'flexibility' => $communication->date_flexibility,
            //'alt_ask' => $communication->alt_ask,
            //'reminder' => $communication->reminder,
            //'sample' => $communication->sample,
            'note' => $communication->notes,
            'tag' => $communication->bsd_tag,
            'url' => env('APP_URL') . '/communications/' . $communication->id,
            'created' => $communication->created_at,
            'updated' => $communication->updated_at,
        ])->render();
    }

    private function createDataEmail($communication)
    {
        return view('email', [
            'email' => $communication->user->email,
            'ask' => $communication->ask->label,
            'audience' => 'xxx',
            'recipients' => $communication->approx_recipients,
            'flexibility' => $communication->date_flexibility,
            //'alt_ask' => $communication->alt_ask,
            //'reminder' => $communication->reminder,
            //'sample' => $communication->sample,
            'note' => $communication->note,
            'tag' => $communication->bsd_tag,
            'url' => env('APP_URL') . '/communications/' . $communication->id,
            'created' => $communication->created_at,
            'updated' => $communication->updated_at,
        ])->render();
    }
}
