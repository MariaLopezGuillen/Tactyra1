<?php

namespace App\Http\Controllers;

use App\Models\Player;

class DashboardController extends Controller
{
    public function index()
    {
        // obtener jugadores
        $players = Player::latest()->get();

        // enviar siempre la variable a la vista
        return view('dashboard', compact('players'));
    }
}