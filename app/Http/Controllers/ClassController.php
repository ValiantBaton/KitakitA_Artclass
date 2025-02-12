<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassModel::with('pengajar')->get();
        return Inertia::render('Classes/Index', ['classes' => $classes]);
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
            'nama_kelas' => 'required|string|max:255',
            'id_pengajar' => 'required|exists:users,id',
            'tipe' => 'required|in:privat,kelompok',
            'paket' => 'required|in:reguler,plus',
            'status' => 'required|in:berjalan,libur',
            'alasan_libur' => 'nullable|string',
        ]);

        $class = ClassModel::create($validated);
        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = ClassModel::with('pengajar')->findOrFail($id);
        return Inertia::render('Classes/Show', ['class' => $class]);
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
        $class = ClassModel::findOrFail($id);
        $validated = $request->validate([
            'nama_kelas' => 'string|max:255',
            'id_pengajar' => 'exists:users,id',
            'tipe' => 'in:privat,kelompok',
            'paket' => 'in:reguler,plus',
            'status' => 'in:berjalan,libur',
            'alasan_libur' => 'nullable|string',
        ]);

        $class->update($validated);
        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = ClassModel::findOrFail($id);
        $class->delete();
        return redirect()->route('classes.index');
    }
}
