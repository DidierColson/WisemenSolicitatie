<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Storage;


class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pokemon::truncate();

        //$json = Storage::disk('local')->get('database/data/pokemons.json');
        $pokemons = json_decode(file_get_contents('database/data/pokemons.json', false));

        //print($pokemons[0]->abilities[0]->ability->name);

        /*foreach($pokemons as $p){
            print($p->name);
        }*/

        foreach ($pokemons as $value) {
            Pokemon::create([
                "abilities" => json_encode($value->abilities),
                "base_experience" => $value->base_experience,
                "forms" => json_encode($value->forms),
                "game_indices" => json_encode($value->game_indices),
                "height" => $value->height,
                "moves" => json_encode($value->moves),
                "name" => $value->name,
                "types" => json_encode($value->types)
            ]);

        }
    }
}
