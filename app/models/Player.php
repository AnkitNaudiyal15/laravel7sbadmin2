<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'identifier', 'player_jersey_number','first_name','last_name','image_uri','country','matches','run','fifties','hundreds','team_id'
    ];
}
