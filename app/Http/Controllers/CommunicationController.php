<?php

namespace App\Http\Controllers;

use App\Communication;
use App\Basket;
use App\Area;
use App\SubArea;
use App\CampaignPush;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calendarUpdate(Request $request)
    {
        $comm = Communication::findOrFail($request->id);

        if(isset($request->start_date)){
            $comm->start_date = $request->start_date;
        }

        if(isset($request->end_date)){
            $comm->end_date = $request->end_date;
        }
        
        $result = $comm->save();

        return response()->json([
            'status' => 'sucess',
        ]);
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

        $subAreas = SubArea::with(['campaignPushes' => function ($q) {
            $q->orderBy('label', 'asc');
        }])->get();

        $initialAreas = Area::where('active', 1)->get();
        $initialsubAreas = SubArea::where('active', 1)->get();
        $initialPushes = CampaignPush::where('active', 1)->get();

        $areasByBasket = $baskets->groupBy('label');
        $subAreasByArea = $areas->groupBy('label');
        $pushesBysubArea = $subAreas->groupBy('label');

        $asks = Ask::where('active', 1)->get();
        $audiences = Audience::where('active', 1)->get();
        $mediums = Medium::where('active', 1)->get();
        $users = User::where('active', 1)->get();

        return view('communication/create', [
            'communication' => '',

            'baskets' => $baskets,
            'areas' => $initialAreas,
            'subAreas' => $initialsubAreas,
            'pushes' => $initialPushes,

            'areasByBasket' => $areasByBasket,
            'subAreasByArea' => $subAreasByArea,
            'pushesBysubArea' => $pushesBysubArea,

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
        $this->validateCommunication(false, $request);
        $communication = new Communication();
        $this->saveCommunication($communication, $request);

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

                $trello->createWebhook($trelloCard->card_id);

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
            ['key' => 'Sub Area','value' => isset($communication->subArea) ? $communication->subArea->label : null],
            ['key' => 'Push','value' => isset($communication->campaignPush) ? $communication->campaignPush->label : null],
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

        $subAreas = SubArea::with(['campaignPushes' => function ($q) {
            $q->orderBy('label', 'asc');
        }])->get();

        //$initialAreas = $communication->basket->areas->sortBy('label');
        //$initialsubAreas = $communication->area->subAreas->sortBy('label');
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

        if(isset($communication->subArea)){
            $initialPushes = $communication->subArea->campaignPushes->sortBy('label');
        } else {
            $initialPushes = CampaignPush::where('active', 1)->get();  
        }

        $areasByBasket = $baskets->groupBy('label');
        $subAreasByArea = $areas->groupBy('label');
        $pushesBysubArea = $subAreas->groupBy('label');

        $asks = Ask::where('active', 1)->get();
        $audiences = Audience::where('active', 1)->get();
        $mediums = Medium::where('active', 1)->get();
        $users = User::where('active', 1)->get();

        $communication->user_id = auth()->user()->id;
        $communication->title = $communication->title . ' - COPY - ' . time();

        return view('communication/create', [
            'communication' => $communication,

            'baskets' => $baskets,
            'areas' => $initialAreas,
            'subAreas' => $initialsubAreas,
            'pushes' => $initialPushes,

            'areasByBasket' => $areasByBasket,
            'subAreasByArea' => $subAreasByArea,
            'pushesBysubArea' => $pushesBysubArea,

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

        $subAreas = SubArea::with(['campaignPushes' => function ($q) {
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

        if(isset($communication->subArea)){
            $initialPushes = $communication->subArea->campaignPushes->sortBy('label');
        } else {
            $initialPushes = CampaignPush::where('active', 1)->get();  
        }


        $areasByBasket = $baskets->groupBy('label');
        $subAreasByArea = $areas->groupBy('label');
        $pushesBysubArea = $subAreas->groupBy('label');

        $asks = Ask::where('active', 1)->get();
        $audiences = Audience::where('active', 1)->get();
        $mediums = Medium::where('active', 1)->get();
        $users = User::where('active', 1)->get();


        return view('communication/edit', [
            'communication' => $communication,

            'baskets' => $baskets,
            'areas' => $initialAreas,
            'subAreas' => $initialsubAreas,
            'pushes' => $initialPushes,

            'areasByBasket' => $areasByBasket,
            'subAreasByArea' => $subAreasByArea,
            'pushesBysubArea' => $pushesBysubArea,

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
        $this->validateCommunication($communication, $request);
        $this->saveCommunication($communication, $request);

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


    private function validateCommunication($communication = false, $request)
    {
        // core validation
        $validationRules = [
            'description' => 'required',
            'basket' => 'required',
            'area' => 'required',
            //'subarea' => 'required',
            //'campaignpush' => 'required',
            'ask_id' => 'required',
            'audiences' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'user_id' => 'required',
        ];  

        // if update, exclude id from unique search
        if(isset($communication->id)) {
            $validationRules['title'] = 'required|unique:communications,title,' . $communication->id . '|max:255';
        } else {
            $validationRules['title'] = 'required|unique:communications|max:255';
        }

        // run core validation
        $request->validate($validationRules);

        // if store, build Communication for additional validation
        if(!isset($communication->id)) {
            $communication = new Communication();
            $communication->area_id = $request->area;
        }

        // additional validation
        if(isset($communication->area->subAreas[0])) {
            $validationRules['subarea'] = 'required';

            if(isset($communication->subArea->campaignPushes[0])) {
                $validationRules['campaignpush'] = 'required';
            } 
        }

        //additional validation
        $request->validate($validationRules);
    }


    private function saveCommunication($communication, $request) 
    {
        $communication->title = $request->title;
        $communication->description = $request->description;

        $communication->basket_id = $request->basket;
        $communication->area_id = $request->area;
        $communication->sub_area_id = $request->subarea;
        $communication->campaign_push_id = $request->campaignpush;

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

        // save communication - has to be before audience sync for store()
        $communication->save();

        // sync audiences - has to be after save() for store()
        $communication->audiences()->sync($request->audiences);

        // Build tag Array for mandatory fields (check if tag is label or specified value)
        $bsdTag = [
            'basket' => isset($communication->basket->tag) ? $communication->basket->tag : $communication->basket->label,
            'area' => isset($communication->area->tag) ? $communication->area->tag : $communication->area->label,
            //'subArea' => isset($communication->subArea->tag) ? $communication->subArea->tag : $communication->subArea->label,
            'ask' => isset($communication->ask->tag) ? $communication->ask->tag : $communication->ask->label,
        ];

        // Add subArea to tag Array (optional field)
        if(isset($communication->subArea)) {
            $bsdTag['subArea'] = isset($communication->subArea->tag) ? $communication->subArea->tag : $communication->subArea->label;
        } else {
            $bsdTag['subArea'] = '';
        }

        // old catch for when we used "N/A" as fix for subAreas without areas
        if( $bsdTag['subArea'] == 'NA' ) {
            $bsdTag['subArea'] = '';
        }

        // loop through audiences and add to Array
        foreach ($communication->audiences as $audience) {
            if(isset($audience->tag)){
                $bsdTag['audience'][] = $audience->tag;
            } else {
                $bsdTag['audience'][] = $audience->label;
            }
        }

        // build tag String
        $communication->bsd_tag = "{$bsdTag['basket']},{$bsdTag['area']},{$bsdTag['subArea']},{$bsdTag['ask']}";

        // loop through audience and add to tag String
        foreach ($bsdTag['audience'] as $audience) {
            $communication->bsd_tag .= ',' . $audience;
        }

        // finally save communication!
        return $communication->save();
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
            'note' => $communication->notes,
            'tag' => $communication->bsd_tag,
            'url' => env('APP_URL') . '/communications/' . $communication->id,
            'created' => $communication->created_at,
            'updated' => $communication->updated_at,
        ])->render();
    }

    private function createDataEmail($communication)
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

        return view('email', [
            'email' => $communication->user->email,
            'description' => $communication->description,
            'ask' => $communication->ask->label,
            'audience' => $audiences,
            'recipients' => $communication->approx_recipients,
            'flexibility' => $communication->date_flexibility,
            'note' => $communication->notes,
            'tag' => $communication->bsd_tag,
            'url' => env('APP_URL') . '/communications/' . $communication->id,
            'created' => $communication->created_at,
            'updated' => $communication->updated_at,
        ])->render();
    }
}
