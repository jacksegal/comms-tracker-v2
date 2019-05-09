<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrelloCard extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['card_id'];


    /**
     * Get the communication that the trello card belongs to.
     */
    public function communication()
    {
    	return $this->hasOne('App\Communication');
    }
}
