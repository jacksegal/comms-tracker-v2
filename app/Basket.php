<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    /**
     * Get the areas for the basket.
     */
    public function areas()
    {
        return $this->hasMany('App\Area');
    }
}
