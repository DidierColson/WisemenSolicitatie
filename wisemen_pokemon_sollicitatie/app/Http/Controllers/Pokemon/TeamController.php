<?php

namespace App\Http\Controllers\Pokemon;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use App\Models\Team;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class TeamController extends Controller
{
    public function findSpecificTeam($id): String
    {
        return Team::findOrFail($id)->names;
    }

    public function addTeam(Request $request){

        $ids = $request->input('ids');

        $team = new Team();
        $teamArray = [];
        foreach($ids as $id){
            $pokemon = Pokemon::findOrFail($id);
            array_push($teamArray, $pokemon->name); 
        }
        /*$team->names = $teamArray;
        $team->save();*/
        Team::create([
            "names" => json_encode($teamArray)
        ]);
    }
}
