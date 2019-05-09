<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrelloCard;
use Carbon\Carbon;

class TrelloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// creating webhook - passing response to trello
        return 'success';
    }

    public function update(Request $request)
    {
    	$trelloRequest = $request->all();
    	
    	$id = $trelloRequest['model']['id'];
    	$startDate = new Carbon($trelloRequest['model']['due']);
    	$endDate = $startDate->copy()->addDays(1);
    	
    	$trello = TrelloCard::where('card_id', '=', $id)->firstOrFail();
    	$comm = $trello->communication;

    	$comm->start_date = $startDate->toDateString();
    	$comm->end_date = $endDate->toDateString();
    	$comm->save();

    	return 'success';
    }

}
