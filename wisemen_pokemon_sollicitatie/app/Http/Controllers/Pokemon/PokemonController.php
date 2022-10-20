<?php

namespace App\Http\Controllers\Pokemon;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use http\Env\Request;
use Illuminate\Database\Eloquent\Collection;


class PokemonController extends Controller
{

    public function index(): array
    {

        //return Pokemon::all();
        $pokemons = Pokemon::all();
        $listToReturn = [];
        foreach($pokemons as $pokemon){
            array_push($listToReturn, "{$pokemon->id}: {$pokemon->name}");
        }
        return $listToReturn;
    }

    public function findSpecificPokemon($id): String
    {
        try
        {
            return Pokemon::findOrFail($id)->name;
        }
        catch(ModelNotFoundException $e)
        {
            return (new Response('Model not found', 400));
        }
    }

}
