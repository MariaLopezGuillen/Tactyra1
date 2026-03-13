<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request $request)
{

$attendance = $request->attendance;

$totalSessions = 3; // lunes, miercoles, jueves
$totalPlayers = count($attendance);

$misses = 0;

foreach($attendance as $player){

foreach($player as $day){

if(!$day){
$misses++;
}

}

}

$totalPossible = $totalPlayers * $totalSessions;

$percentage = ($misses / $totalPossible) * 100;

return redirect()->route('dashboard')
->with('attendance_percentage', round($percentage));

}
}
