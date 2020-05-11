<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Player;
use App\models\Team;
use Datatables;
use App\Http\Requests\TeamRequest;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('player/player');
    }


     /**
     * Display a listing of the resource usign ajaz.
     *
     * @return \Illuminate\Http\Response
     */
    public function playerindex()
    {
        return Datatables::of(Player::query())->editColumn('image_uri', function ($player) {
            //$action = "<img src='".urldecode($player->image_uri)."' width='100%' height='100%'>";
            $action = urldecode($player->image_uri);
            return $action;
        })->editColumn('team_id', function ($player) {
            $team=Team::find($player->team_id);
            return $team->name;
        })->addColumn('edit_action', function ($player) {
            $action = "<a href='" . route('players.edit', [$player->id]) . "'>
                            <button class='btn btn-xs btn-danger'>Edit</button>
                      <a>";
            return $action;
        })->addColumn('delete_action', function ($player) {
            $action = " <form class='form-group'onsubmit=\"return confirm('Do you really want to Delete?');\" action='" . route('players.destroy',
                    [$player->id]) . "' method='POST'>
                    " . csrf_field() . "
                    <input type='hidden' name='_method' value='DELETE'>
                    <input type='hidden' name='_method' value='DELETE'>
                    <button class='btn btn-xs btn-danger'>Delete</button>
                </form>";
            return $action;
        })->rawColumns(['edit_action', 'delete_action'])->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams=Team::all();
        return view('/player/playeradd', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Player::firstOrCreate(['first_name' => $request->get('first_name'),'last_name' => $request->get('last_name')],
        [
            'image_uri' => urlencode($request->get('image_uri')),
            'identifier' => $request->get('identifier'),
            'player_jersey_number' => $request->get('player_jersey_number'),
            'club_state' => $request->get('club_state'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'country' => $request->get('country'),
            'matches' => $request->get('matches'),
            'run' => $request->get('run'),
            'fifties' => $request->get('fifties'),
            'hundreds' => $request->get('hundreds'),
            'team_id' => $request->get('team_id')
        ]
    );

    return view('player.player'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $teams=Team::all();
        return view('player.playeredit',compact('player','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $player->image_uri = urlencode($request->image_uri);
        $player->identifier = $request->identifier;
        $player->team_id = $request->team_id;
        $player->player_jersey_number = $request->player_jersey_number;
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->country = $request->country;
        $player->matches = $request->matches;
        $player->run = $request->run;
        $player->fifties = $request->fifties;
        $player->hundreds = $request->hundreds;
        $player->save();
        return redirect('players');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return view('player.player'); 
    }
}
