<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreteamsRequest;
use App\Http\Requests\UpdateteamsRequest;
use Illuminate\Http\Request;
use App\Models\teams;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teams_arr = teams::all();
        return view('teams', compact('teams_arr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_record = false;
        $record_save = false;
        $user_message = null;

        if ($request->input("save") === "1") 
        {
            //normally we would do some field validation here
            $new_record = true;
            $teams = new teams();
            $teams->name = $request->input("name");
            $teams->mascot = $request->input("mascot");
            $teams->colors = $request->input("colors");
            $record_save = $teams->save();

            if ($record_save === true) 
            {
                $user_message = '<span>Team successfully added!</span>';
            } 
            else 
            {
                $user_message = '<span class="error">There was an error adding the team.</span>';
            }
        }

        $teams_arr = teams::all();
        
        return view('teams', compact('user_message', 'teams_arr'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function show(teams $teams)
    {
        $teams_arr = teams::all();
        return view('teams', compact('teams_arr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teams  $teams
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $team_info = teams::find($request->input('id'));
        $team_found = (empty($team_info)) ? false : true;
        $teams_arr = null;
        
        if ($team_found === true) 
        {
            return view('form', compact('team_info', 'team_found'));
        } 
        else 
        {
            $user_message = '<span class="error">We could not find that team.</span>';
            return view('teams', compact('user_message', 'teams_arr'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_message = null;

        if ($request->input("save") === "1" && $request->input('id') !== null) {
            $teams = teams::find($request->input('id'));
            
            $teams->name = $request->input("name");
            $teams->mascot = $request->input("mascot");
            $teams->colors = $request->input("colors");
            $record_save = $teams->save();

            if ($record_save === true) 
            {
                $user_message = '<span>Team successfully edited!</span>';
            } 
            else 
            {
                $user_message = '<span class="error">There was an error editing the team.</span>';
            }
        }

        $teams_arr = teams::all();
        
        return view('teams', compact('user_message', 'teams_arr'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $team_info = teams::find($request->input('id'));
        $team_found = (empty($team_info)) ? false : true;

        if (!empty($team_info)) 
        {
            $team_delete = $team_info->delete();
        }

        $teams_arr = teams::all();
        
        if ($team_found === true && $team_delete === true) 
        {
            $user_message = '<span>The team was deleted successfully.</span>';
            return view('teams', compact('user_message', 'teams_arr'));
        } 
        else 
        {
            $user_message = '<span class="error">There was an error deleting that team.</span>';
            return view('teams', compact('user_message', 'teams_arr'));
        }
    }
}
