<?php

namespace App\Http\Controllers\Pokemon;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use http\Env\Request;
use Illuminate\Database\Eloquent\Collection;


class PokemonController extends Controller
{

    public function index(): Collection
    {

        return Pokemon::all();
    }

    public function findSpecificPokemon($id): String
    {
        
        return Pokemon::findOrFail($id)->name;
    }

}
