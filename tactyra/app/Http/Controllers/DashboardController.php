<?php

namespace App\Http\Controllers;

use App\Models\Player;
   use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

public function index(Request $request)
{
    // 👉 coger el club desde la URL
    $clubSeleccionado = $request->get('club');

    // 👉 clubes únicos (para los botones)
    $clubs = Player::select('club')
        ->whereNotNull('club')
        ->distinct()
        ->pluck('club');

    // 👉 FILTRO
    $players = Player::when($clubSeleccionado, function ($query) use ($clubSeleccionado) {
        $query->where('club', $clubSeleccionado);
    })->latest()->get();

    return view('dashboard', compact('players', 'clubs'));
}
}