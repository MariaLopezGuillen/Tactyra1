<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index(Request $request)
    {
        $club = $request->get('club');

        $clubs = Player::select('club')
            ->whereNotNull('club')
            ->distinct()
            ->pluck('club');

        $players = Player::when($club, function ($query) use ($club) {
            $query->where('club', $club);
        })->get();

        return view('players.index', compact('players', 'clubs'));
    }

    public function create()
    {
        return view('players.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'club' => 'required',
            'position' => 'required',
        ]);

        Player::create($request->all());

        return redirect()->route('players.index')
            ->with('success', 'Jugador creado');
    }

    // 🔥 EDIT
    public function edit(Player $player)
    {
        return view('players.edit', compact('player'));
    }

    // 🔥 UPDATE
    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name' => 'required',
            'club' => 'required',
            'position' => 'required',
        ]);

        $player->update($request->all());

        return redirect()->route('players.index')
            ->with('success', 'Jugador actualizado');
    }

    // 🔥 DELETE
    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('players.index')
            ->with('success', 'Jugador eliminado');
    }
}