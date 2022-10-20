<?php

use App\Http\Controllers\Pokemon\PokemonController;
use App\Http\Controllers\Pokemon\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'pokemon', 'namespace' => 'App\Http\Controllers\Pokemon'], function(){
    Route::apiResource('pokemons', PokemonController::class);
    Route::get('detail/{id}', [PokemonController::class, 'findSpecificPokemon']);
    Route::get('team/{id}', [TeamController::class, 'findSpecificTeam']);
    Route::post('team', [TeamController::class, 'addTeam']);
});
