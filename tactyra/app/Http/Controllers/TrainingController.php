<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingDay;

class TrainingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'days' => 'required|array|max:3'
        ]);

        // borrar días anteriores
        TrainingDay::truncate();

        foreach ($request->days as $day) {
            TrainingDay::create([
                'day' => $day
            ]);
        }

        return back()->with('success', 'Días guardados correctamente');
    }
}