<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Pemasukan;

class PengeluaranController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric'
        ]);

        $pengeluaran = Pengeluaran::create($request->all());

        // No deduction from pemasukan balance

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Pengeluaran berhasil ditambahkan');
    }

    public function index()
    {
        $pengeluarans = Pengeluaran::paginate(10); // Retrieve paginated Pengeluaran records
        return view('pengeluaran.index', compact('pengeluarans')); // Pass the records to the view
    }

    public function create()
    {
        return view('pengeluaran.create'); // Return the view for creating a new Pengeluaran
    }

    public function show($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id); // Retrieve the Pengeluaran record
        return view('pengeluaran.show', compact('pengeluaran')); // Pass the record to the view
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id); // Retrieve the Pengeluaran record
        return view('pengeluaran.edit', compact('pengeluaran')); // Pass the record to the edit view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric'
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->update($request->all());

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Pengeluaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id); // Retrieve the Pengeluaran record
        $pengeluaran->delete(); // Delete the record
        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil dihapus'); // Redirect with success message
    }
}
