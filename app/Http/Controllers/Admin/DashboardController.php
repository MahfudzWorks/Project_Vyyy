<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Faq;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrder = Order::count();
        $konsultasi = Order::where('status', 'konsultasi')->count();
        $faq = Faq::count();
        $user = User::count();
        $service = Service::count();
        $totalRevenue = Order::where('status', 'selesai')->sum('harga');
        $pendingOrder = Order::where('status', 'pending')->count();

        $latestOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Grafik Order per Bulan (1 query)
        $chart = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month');

        $orderPerMonth = [];

        for ($i = 1; $i <= 12; $i++) {
            $orderPerMonth[] = $chart[$i] ?? 0;
        }

        // Grafik Penghasilan per Bulan (Order Selesai)
        $revenueChart = Order::selectRaw('MONTH(created_at) as month, SUM(harga) as total')
            ->whereYear('created_at', now()->year)
            ->where('status', 'selesai')
            ->groupBy('month')
            ->pluck('total', 'month');

        $revenuePerMonth = [];

        for ($i = 1; $i <= 12; $i++) {
            $revenuePerMonth[] = $revenueChart[$i] ?? 0;
        }

        // Grafik Status (1 query)
        $status = Order::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $statusOrder = [
            $status['pending'] ?? 0,
            $status['konsultasi'] ?? 0,
            $status['menunggu_pembayaran'] ?? 0,
            $status['diproses'] ?? 0,
            $status['revisi'] ?? 0,
            $status['selesai'] ?? 0,
            $status['dibatalkan'] ?? 0,
        ];

        return view('admin.dashboard', compact(
            'totalOrder',
            'konsultasi',
            'faq',
            'user',
            'service',
            'latestOrders',
            'orderPerMonth',
            'revenuePerMonth',
            'statusOrder',
            'totalRevenue',
            'pendingOrder',
        ));
    }
}
