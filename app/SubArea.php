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
}
