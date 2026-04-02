<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\TrainingDay;

class AttendanceController extends Controller
{



    public function index(Request $request)
    {
        $clubSeleccionado = $request->get('club', 'todos');

        $clubs = \App\Models\Player::select('club')
            ->whereNotNull('club')
            ->distinct()
            ->pluck('club');

        $players = \App\Models\Player::when($clubSeleccionado !== 'todos', function ($query) use ($clubSeleccionado) {
            $query->where('club', $clubSeleccionado);
        })->get();

        // 🔥 días dinámicos
        $trainingDays = TrainingDay::pluck('day')->unique();

        return view('attendance.index', compact('players', 'clubs', 'trainingDays', 'clubSeleccionado'));
    }


    // ✅ GUARDAR ASISTENCIA
    public function store(Request $request)
    {
        $attendance = $request->attendance ?? [];

        $totalSessions = 3;

        $players = Player::all();

        $playersAttendance = [];

        foreach ($players as $player) {

            $days = $attendance[$player->id] ?? [];

            $present = count($days);
            $missed = $totalSessions - $present;

            $percentage = ($missed / $totalSessions) * 100;

            $playersAttendance[] = [
                'name' => $player->name,
                'percentage' => round($percentage)
            ];
        }

        usort($playersAttendance, function ($a, $b) {
            return $a['percentage'] <=> $b['percentage'];
        });

        return redirect()->route('dashboard')
            ->with('attendance_players', $playersAttendance);
    }
}
