<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::with('class')->get();
        return Inertia::render('Schedules/Index', ['schedules' => $schedules]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kelas' => 'required|exists:classes,id',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
        ]);

        $schedule = Schedule::create($validated);
        return redirect()->route('schedules.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $schedule = Schedule::findOrFail($id);
        $validated = $request->validate([
            'id_kelas' => 'exists:classes,id',
            'tanggal' => 'date',
            'lokasi' => 'string|max:255',
        ]);

        $schedule->update($validated);
        return redirect()->route('schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('schedules.index');
    }
}
