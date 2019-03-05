<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{

	/**
     * Get the area for this sub-area.
     */
    public function area()
    {
        return $this->belongsTo('App\Area');
    }


    /**
     * Get the campaign pushes for this sub-area.
     */
    public function campaignPushes()
    {
        return $this->hasMany('App\CampaignPush');
    }	

}
