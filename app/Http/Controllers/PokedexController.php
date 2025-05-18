<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokedexController extends Controller
{
    private $POKEAPI_URL;

    public function __construct()
    {
        $this->POKEAPI_URL = config('services.pokeapi.url');
    }

    public function listPokemons(Request $request)
    {
        $limit = $request->get('limit', 20);
        $offset = $request->get('offset', 0);

        $response = Http::get($this->POKEAPI_URL, [
            'limit' => $limit,
            'offset' => $offset,
        ]);

        return response()->json($response->json());
    }

    public function findPokemon($name)
    {
        $response = Http::get("{$this->POKEAPI_URL}/{$name}");
        if ($response->failed()) {
            return null;
        }
        return $response->json();
    }

    public function showPokemon($name)
    {
        $pokemon = $this->findPokemon($name);
        if (!$pokemon) {
            return response()->json(['error' => 'Pokemon not found'], 404);
        }
        return response()->json($pokemon);
    }
}
