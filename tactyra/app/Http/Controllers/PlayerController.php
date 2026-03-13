<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'number' => 'nullable|integer|min:1|max:99',
                'club' => 'required|string|max:255',
                'category' => 'required|string|max:100',
                'position' => 'required|string|max:100',
                'age' => 'nullable|integer|min:2|max:50',

                'speed' => 'nullable|integer|min:0|max:100',
                'passing' => 'nullable|integer|min:0|max:100',
                'shooting' => 'nullable|integer|min:0|max:100',
                'defense' => 'nullable|integer|min:0|max:100',
                'physical' => 'nullable|integer|min:0|max:100',
            ],
            [
                'age.required' => 'La edad es obligatoria.',
                'age.integer' => 'La edad debe ser un número entero.',
                'age.min' => 'La edad mínima es de 2 años.',
                'age.max' => 'La edad máxima es de 50 años.',
            ]
        );

        Player::create($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Jugador creado correctamente');
    }


    public function update(Request $request, Player $player)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'nullable|integer|min:1|max:99',
            'club' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'age' => 'required|integer|min:5|max:50',

            'speed' => 'nullable|integer|min:0|max:100',
            'passing' => 'nullable|integer|min:0|max:100',
            'shooting' => 'nullable|integer|min:0|max:100',
            'defense' => 'nullable|integer|min:0|max:100',
            'physical' => 'nullable|integer|min:0|max:100',
        ]);

        $player->update($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Jugador actualizado correctamente');
    }


    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Jugador eliminado correctamente');
    }
}
