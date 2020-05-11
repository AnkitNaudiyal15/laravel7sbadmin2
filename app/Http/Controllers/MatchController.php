<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Match;
use App\models\Team;
use Datatables;
use App\Http\Requests\TeamRequest;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('match.match');
    }


     /**
     * Display a listing of the resource usign ajaz.
     *
     * @return \Illuminate\Http\Response
     */
    public function matachindex()
    {
        return Datatables::of(Match::query())->editColumn('team1_id', function ($match) {
            $team=Team::find($match->team1_id);
            return $team->name;
        })->editColumn('team2_id', function ($match) {
            $team=Team::find($match->team2_id);
            return $team->name;
        })->addColumn('edit_action', function ($match) {
            $action = "<a href='" . route('matches.edit', [$match->id]) . "'>
                            <button class='btn btn-xs btn-danger'>Edit</button>
                      <a>";
            return $action;
        })->addColumn('delete_action', function ($match) {
            $action = " <form class='form-group'onsubmit=\"return confirm('Do you really want to Delete?');\" action='" . route('matches.destroy',
                    [$match->id]) . "' method='POST'>
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
        $teams= Team::all();
        return view('match.matchadd', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Match::firstOrCreate(['team1_id' => $request->get('team_id1'),'team2_id' => $request->get('team_id2')],
        [
            'team1_id' => $request->get('team_id1'),
            'team2_id' => $request->get('team_id2'),
            'match_date' => $request->get('match_date'),
            'match_point_team1' => $request->get('match_point_team1'),
            'winner_team_id' => $request->get('winner_team_id'),
            'match_point_team2' => $request->get('match_point_team2')
        ]
    );

    return view('match.match'); 
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
    public function edit(Match $match)
    {
        $teams=Team::all();
        return view('match.matchedit',compact('teams','match'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        $match->team1_id = $request->team_id1;
        $match->team2_id = $request->team_id2;
        $match->match_date = $request->match_date;
        $match->match_point_team1 = $request->match_point_team1;
        $match->match_point_team2 = $request->match_point_team2;
        $match->winner_team_id = $request->winner_team_id;
        $match->save();
        return redirect('matches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        $match->delete();
        return view('match.match'); 
    }
}
