<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'team1_id', 'team2_id','match_point','match_point','winner_team_id2','match_date'
    ];
}
