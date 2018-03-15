<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    /**
     * Get the basket for this area.
     */
    public function basket()
    {
        return $this->belongsTo('App\Basket');
    }

    /**
     * Get the sub-areas for the area.
     */
    public function subAreas()
    {
        return $this->hasMany('App\SubArea');
    }
}
