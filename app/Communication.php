<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Communication extends Model
{
    /**
     * Get the basket for the communication.
     */
    public function basket()
    {
        return $this->belongsTo('App\Basket');
    }

    /**
     * Get the area for the communication.
     */
    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    /**
     * Get the sub area for the communication.
     */
    public function subArea()
    {
        return $this->belongsTo('App\SubArea');
    }

    /**
     * Get the campaign push for the communication.
     */
    public function campaignPush()
    {
        return $this->belongsTo('App\CampaignPush');
    }

    /**
     * Get the medium for the communication.
     */
    public function medium()
    {
        return $this->belongsTo('App\Medium');
    }

    /**
     * Get the ask for the communication.
     */
    public function ask()
    {
        return $this->belongsTo('App\Ask');
    }


    /**
     * The audiences that belong to the communication.
     */
    public function audiences()
    {
        return $this->belongsToMany('App\Audience', 'communication_audiences')->withTimestamps();;
    }

    /**
     * Get the user for the communication.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the trello card for the communication.
     */
    public function trelloCard()
    {
        return $this->belongsTo('App\TrelloCard');
    }

    public function getStartDate()
    {
        return Carbon::createFromFormat('Y-m-d', $this->start_date)->format('d/m/Y');
    }

    public function getEndDate()
    {
        return Carbon::createFromFormat('Y-m-d', $this->end_date)->format('d/m/Y');
    }
}
