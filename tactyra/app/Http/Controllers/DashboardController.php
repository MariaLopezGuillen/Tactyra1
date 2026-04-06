<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Note;

class DashboardController extends Controller
{
    public function index()
    {
        $players = Player::with('notes')->get();

        // 📊 SIMULACIÓN DE ESTADO (puedes hacerlo real luego)
        foreach ($players as $player) {
            $player->status = rand(70, 100);
        }

        $notes = Note::with('player')->latest()->take(5)->get();

        return view('dashboard', compact('players', 'notes'));
    }

    public function storeNote(Request $request)
    {
        $request->validate([
            'player_id' => 'required|exists:players,id',
            'content' => 'required'
        ]);

        Note::create($request->all());

        return back()->with('success', 'Nota guardada');
    }
}