<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with('class')->get();
        return Inertia::render('Payments/Index', ['payments' => $payments]);
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
            'jumlah' => 'required|numeric',
            'status' => 'required|in:belum bayar,sudah bayar',
            'tanggal_tagih' => 'required|date',
        ]);

        $payment = Payment::create($validated);
        return redirect()->route('payments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::with('class')->findOrFail($id);
        return Inertia::render('Payments/Show', ['payment' => $payment]);
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
        $payment = Payment::findOrFail($id);
        $validated = $request->validate([
            'id_kelas' => 'exists:classes,id',
            'jumlah' => 'numeric',
            'status' => 'in:belum bayar,sudah bayar',
            'tanggal_tagih' => 'date',
        ]);

        $payment->update($validated);
        return redirect()->route('payments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route('payments.index');
    }
}
