<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class DashboardController extends Controller
{
    public function index()
    {

        // Menghitung total pemasukan, jumlah pemasukan, dan rata-rata pemasukan
        $totalPemasukan = Pemasukan::sum('jumlah');
        $totalPengeluaran = Pengeluaran::sum('jumlah');
        $currentBalance = $totalPemasukan - $totalPengeluaran;
        $avgPemasukan = Pemasukan::avg('jumlah');

        // Mendapatkan 5 pemasukan terbaru
        $latestPemasukan = Pemasukan::latest()->take(5)->get();

        // Data untuk chart
        $chartData = Pemasukan::selectRaw('SUM(jumlah) as total, MONTH(created_at) as bulan')
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')  // Sort by month number
            ->pluck('total', 'bulan');

        // Mendapatkan labels dan values untuk chart
        // Labels as month names, e.g., January, February, etc.
        $chartLabels = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'May',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Aug',
            9 => 'Sep',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dec'
        ];

        // Initialize values for all 12 months
        $chartValues = array_fill(1, 12, 0);

        // Fill in values for months that have data
        foreach ($chartData as $month => $value) {
            $chartValues[$month] = (float)$value;
        }

        // Convert to arrays with proper ordering
        $chartLabels = array_values($chartLabels);
        $chartValues = array_values($chartValues);

        // Data for expenses chart
        $expenseChartData = Pengeluaran::selectRaw('SUM(jumlah) as total, MONTH(created_at) as bulan')
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')  // Sort by month number
            ->pluck('total', 'bulan');

        // Initialize values for all 12 months for expenses
        $expenseChartValues = array_fill(1, 12, 0);

        // Fill in values for months that have data
        foreach ($expenseChartData as $month => $value) {
            $expenseChartValues[$month] = (float)$value;
        }

        // Convert to arrays with proper ordering
        $expenseChartValues = array_values($expenseChartValues);

        return view('dashboard.dashboard', compact(
            'totalPemasukan',
            'currentBalance',
            'avgPemasukan',
            'latestPemasukan',
            'chartLabels',
            'chartValues',
            'expenseChartValues', // Pass the expenses chart values
            // Pass the isAdmin variable to the view
        ));
    }
}
