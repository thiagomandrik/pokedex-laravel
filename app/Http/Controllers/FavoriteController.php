<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()->favorites()->get(['id', 'pokemon_name', 'created_at']);

        return response()->json($favorites);
    }

    public function store($name)
    {
        $user = Auth::user();

        $exists = Favorite::where('user_id', $user->id)
            ->where('pokemon_name', $name)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Pokemon is already in favorites'], 409);
        }

        $favorite = Favorite::create([
            'user_id' => $user->id,
            'pokemon_name' => $name,
        ]);

        return response()->json([
            'message' => 'Pokemon added to favorites',
            'data' => $favorite,
        ], 201);
    }

    public function destroy($name)
    {
        $user = Auth::user();

        $deleted = Favorite::where('user_id', $user->id)
            ->where('pokemon_name', $name)
            ->delete();

        if ($deleted) {
            return response()->json(['message' => 'Pokemon removed from favorites']);
        }

        return response()->json(['message' => 'Pokemon was not in favorites'], 404);
    }
}
