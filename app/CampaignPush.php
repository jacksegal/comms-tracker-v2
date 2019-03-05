<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignPush extends Model
{
    /**
     * Get the sub-area for this campaign push.
     */
    public function subArea()
    {
        return $this->belongsTo('App\SubArea');
    }
}
