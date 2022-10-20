-database seeding command: php artisan db:seed --class=PokemonSeeder
-link all Pokemon data: http://localhost:8000/api/pokemon/pokemons
-link specific pokemon data (name only): http://localhost:8000/api/pokemon/detail/{id}
--------------------------------------------------------------------
What i would like to change :
-Make different DB tables and use foreign keys instead of storing JSON for abilities, game_indices, moves and types.