<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Team;
use Datatables;
use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('team.team');
    }

      /**
     * Display a listing of the resource usign ajaz.
     *
     * @return \Illuminate\Http\Response
     */
    public function teamindex()
    {
        return Datatables::of(Team::query())->editColumn('logo_uri', function ($team) {
            //$action = '<img src="'.urldecode($team->logo_uri).'" width="100%" height="100%">';
            $action = urldecode($team->logo_uri);
            return $action;
        })->addColumn('edit_action', function ($team) {
            $action = "<a href='" . route('teams.edit', [$team->id]) . "'>
                            <button class='btn btn-xs btn-danger'>Edit</button>
                      <a>";
            return $action;
        })->addColumn('delete_action', function ($team) {
            $action = " <form class='form-group'onsubmit=\"return confirm('Do you really want to Delete?');\" action='" . route('teams.destroy',
                    [$team->id]) . "' method='POST'>
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
        return view('team.teamadd');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Team::firstOrCreate(['name' => $request->get('name')],
        [
            'logo_uri' => urlencode($request->get('logo_uri')),
            'identifier' => $request->get('identifier'),
            'name' => $request->get('name'),
            'club_state' => $request->get('club_state')
        ]
    );

    return view('team.team'); 
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('team.teamedit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $team->logo_uri = urlencode($request->logo_uri);
        $team->identifier = $request->identifier;
        $team->name = $request->name;
        $team->club_state = $request->club_state;
        $team->save();
        return redirect('teams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return view('team.team'); 
    }
}
