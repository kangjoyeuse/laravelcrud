<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pemasukan;


class pemasukanController extends Controller
{
    public function index()
    {
        $pemasukans = Pemasukan::all();
        return view('pemasukan.index', compact('pemasukans'));
    }

    public function create()
    {
        return view('pemasukan.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'sumber_dana' => 'string|required',
            'jumlah' => 'integer|required',
            'keterangan' => 'string|required',
        ]);

        Pemasukan::create($validateData);
        return to_route('pemasukan.index');
    }

    public function edit(Pemasukan $pemasukan)
    {
        return view('pemasukan.edit', compact('pemasukan'));
    }

    public function update(Request $request, Pemasukan $pemasukan)
    {
        $validateData = $request->validate([
            'sumber_dana' => 'string|required',
            'jumlah' => 'integer|required',
            'keterangan' => 'string|required',
        ]);

        $pemasukan->update($validateData);
        return to_route('pemasukan.index');
    }

    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();
        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan deleted successfully');
    }
}
