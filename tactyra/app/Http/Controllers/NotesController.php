<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class NotesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'player_id' => 'required|exists:players,id',
            'note' => 'required|string|max:255',
        ]);

        $player = Player::find($request->player_id);
        $player->note = $request->note;
        $player->save();

        return redirect()->back()->with('success', 'Nota guardada correctamente.');
    }
}
