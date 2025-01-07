<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    const MONTHS_IN_YEAR = 12;
    const LATEST_PEMASUKAN_COUNT = 5;

    public function index()
    {
        $totalPemasukan = Pemasukan::sum('jumlah');
        $countPemasukan = Pemasukan::count();
        $avgPemasukan = Pemasukan::avg('jumlah');

        $latestPemasukan = Pemasukan::latest()->take(self::LATEST_PEMASUKAN_COUNT)->get();

        $currentYear = Carbon::now()->year;
        $chartData = Pemasukan::selectRaw('SUM(jumlah) as total, MONTH(created_at) as bulan')
            ->whereYear('created_at', $currentYear)
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->pluck('total', 'bulan');

        $chartLabels = collect(range(1, self::MONTHS_IN_YEAR))->map(function ($month) {
            return Carbon::create(null, $month)->format('M');
        })->toArray();

        $chartValues = array_fill(1, self::MONTHS_IN_YEAR, 0);

        foreach ($chartData as $month => $value) {
            $chartValues[$month] = (float)$value;
        }

        $chartValues = array_values($chartValues);

        return view('dashboard.dashboard', compact(
            'totalPemasukan',
            'countPemasukan',
            'avgPemasukan',
            'latestPemasukan',
            'chartLabels',
            'chartValues'
        ));
    }
}
