<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;


class dashboardController extends Controller
{
    public function index()
    {
        $totalPemasukan = Pemasukan::sum('jumlah');
        $countPemasukan = Pemasukan::count();
        $avgPemasukan = Pemasukan::avg('jumlah');
        $latestPemasukan = Pemasukan::latest()->take(5)->get();
    
        return view('dashboard.dashboard', compact('totalPemasukan', 'countPemasukan', 'avgPemasukan', 'latestPemasukan'));
    
    }
}