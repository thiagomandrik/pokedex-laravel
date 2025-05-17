<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PokedexController extends Controller
{

    public function getPokemon()
    {
        $pokemon = 'blastoise';
        return response()->json([
            'pokemon' => $pokemon
        ]);
    }
}
