<?php

namespace App\Http\Controllers\Pokemon;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use http\Client\Response;
use http\Env\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;


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

    public function findPokemonByName($name)
    {
        return Pokemon::where('name', 'LIKE', '%' . $name . '%')->get();
    }

    public function findPokemonByType($type): array
    {
        $typeLike = Pokemon::where('types', 'LIKE', '%' . $type . '%')->get();
        $pokemonName = [];

        foreach($typeLike as $pokemon)
        {
            array_push($pokemonName, $pokemon->name);
        }
        return $pokemonName;
    }

    public function FindPokemonPaginated($page)
    {
        //$paginated = Pokemon::paginate(15);
        $start = ($page-1) * 15;
        $end = $page *15;
        $paginated = Pokemon::whereBetween('id', [$start, $end])->get();
        $pokemonName = [];

        foreach($paginated as $pokemon)
        {
            array_push($pokemonName, $pokemon->name);
        }
        return $pokemonName;
    }
}
