<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 'identifier','logo_uri','club_state'
    ];
}
