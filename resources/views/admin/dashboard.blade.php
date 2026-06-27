@extends('layouts.admin')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Dashboard Admin
            </h1>

            <p class="text-slate-500 mt-2">
                Selamat datang kembali,
                <span class="font-semibold text-slate-700">
                    {{ Auth::user()->name }}
                </span>.
                Berikut ringkasan aktivitas sistem hari ini.
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow border border-slate-100 px-5 py-3">

            <p class="text-xs text-slate-500">
                Hari Ini
            </p>

            <p class="font-bold text-slate-800">
                {{ now()->translatedFormat('l, d F Y') }}
            </p>

        </div>

    </div>

    <div class="group bg-white rounded-3xl border border-slate-200 shadow-sm
                hover:-translate-y-2 hover:shadow-2xl hover:border-emerald-300
                transition-all duration-300 ease-out p-6 cursor-pointer">

        <div class="flex justify-between">

            <div>

                <p class="text-slate-500">
                    Total Penghasilan
                </p>

                <h2 class="text-3xl font-bold text-emerald-600 mt-2">
                    Rp {{ number_format($totalRevenue,0,',','.') }}
                </h2>

                <p class="text-slate-400 text-sm mt-2">
                    Dari seluruh order selesai
                </p>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center
                        text-2xl group-hover:scale-110 group-hover:rotate-6 transition duration-300">
                💰
            </div>

        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="group bg-white rounded-3xl border border-slate-200 shadow-sm
                    hover:-translate-y-2 hover:shadow-2xl hover:border-blue-300
                    transition-all duration-300 p-6 cursor-pointer">
            <div class="flex justify-between items-start">

                <div>

                    <p class="text-slate-500 text-sm">
                        Total Order
                    </p>

                    <h2 class="text-3xl font-bold mt-2">
                        {{ $totalOrder }}
                    </h2>

                    <p class="text-slate-400 text-sm mt-2">
                        Semua pesanan
                    </p>

                </div>

                <div
                    class="w-14 h-14 rounded-2xl bg-blue-100 text-2xl flex items-center justify-center
        group-hover:bg-blue-600 group-hover:text-white
        group-hover:scale-110 group-hover:rotate-6 transition-all">

                    📦

                </div>

            </div>
        </div>

        <div class="group bg-white rounded-3xl border border-slate-200 shadow-sm
                    hover:-translate-y-2 hover:shadow-2xl hover:border-yellow-300
                    transition-all duration-300 p-6 cursor-pointer">

            <div class="flex justify-between">

                <div>

                    <p class="text-slate-500 text-sm">
                        Konsultasi
                    </p>

                    <h2 class="text-3xl font-bold mt-2 text-yellow-600">
                        {{ $konsultasi }}
                    </h2>

                    <p class="text-slate-400 text-sm mt-2">
                        Menunggu respon
                    </p>

                </div>

                <div
                    class="w-14 h-14 rounded-2xl bg-yellow-100 flex items-center justify-center text-2xl
            group-hover:bg-yellow-500 group-hover:text-white
            group-hover:scale-110 group-hover:rotate-6 transition-all">

                    💬

                </div>

            </div>

        </div>

        <div class="group bg-white rounded-3xl border border-slate-200 shadow-sm
                    hover:-translate-y-2 hover:shadow-2xl hover:border-purple-300
                    transition-all duration-300 p-6 cursor-pointer">

            <div class="flex justify-between">

                <div>

                    <p class="text-slate-500 text-sm">
                        FAQ
                    </p>

                    <h2 class="text-3xl font-bold mt-2 text-purple-600">
                        {{ $faq }}
                    </h2>

                    <p class="text-slate-400 text-sm mt-2">
                        FAQ aktif
                    </p>

                </div>

                <div
                    class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-2xl
            group-hover:bg-purple-600 group-hover:text-white
            group-hover:scale-110 group-hover:rotate-6 transition-all">

                    ❓

                </div>

            </div>

        </div>

        <div class="group bg-white rounded-3xl border border-slate-200 shadow-sm
                    hover:-translate-y-2 hover:shadow-2xl hover:border-green-300
                    transition-all duration-300 p-6 cursor-pointer">

            <div class="flex justify-between">

                <div>

                    <p class="text-slate-500 text-sm">
                        User
                    </p>

                    <h2 class="text-3xl font-bold mt-2 text-green-600">
                        {{ $user }}
                    </h2>

                    <p class="text-slate-400 text-sm mt-2">
                        Total pengguna
                    </p>

                </div>

                <div
                    class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl
            group-hover:bg-green-600 group-hover:text-white
            group-hover:scale-110 group-hover:rotate-6 transition-all">

                    👥

                </div>

            </div>

        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">

            <h3 class="font-semibold mb-5">
                Statistik Order Bulanan
            </h3>

            <div class="h-80">
                <canvas id="orderChart"></canvas>
            </div>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="font-semibold mb-5">
                Status Order
            </h3>

            <canvas id="statusChart"></canvas>

        </div>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <div class="flex justify-between mb-4">

            <h3 class="font-semibold">
                Order Terbaru
            </h3>

            <a href="{{ route('admin.orders.index') }}"
                class="text-blue-600 text-sm">
                Lihat Semua
            </a>

        </div>

        <table class="w-full">

            <thead>

                <tr class="text-left text-gray-500 border-b">

                    <th class="py-3">Customer</th>
                    <th>Layanan</th>
                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($latestOrders ?? [] as $order)

                <tr class="border-b">

                    <td class="py-3">{{ $order->user->name }}</td>
                    <td>{{ $order->judul }}</td>

                    <td>

                        @php
                        $badge = match($order->status) {
                        'pending' => 'bg-gray-100 text-gray-700',
                        'konsultasi' => 'bg-yellow-100 text-yellow-700',
                        'menunggu_pembayaran' => 'bg-orange-100 text-orange-700',
                        'diproses' => 'bg-blue-100 text-blue-700',
                        'revisi' => 'bg-purple-100 text-purple-700',
                        'selesai' => 'bg-green-100 text-green-700',
                        'dibatalkan' => 'bg-red-100 text-red-700',
                        default => 'bg-gray-100 text-gray-700',
                        };
                        @endphp

                        <span class="{{ $badge }} px-3 py-1 rounded-full text-sm">
                            {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                        </span>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="3" class="text-center py-6 text-gray-400">

                        Belum ada order

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const orderPerMonth = @json($orderPerMonth);

        new Chart(document.getElementById('orderChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Order',
                    data: orderPerMonth,

                    borderColor: '#2563eb',

                    backgroundColor: 'rgba(37,99,235,.08)',

                    fill: true,

                    borderWidth: 4,

                    tension: .45,

                    pointRadius: 0,

                    pointHoverRadius: 7,

                    pointHoverBorderWidth: 3,

                    pointBackgroundColor: '#2563eb',

                    pointHoverBackgroundColor: '#ffffff',

                    pointHoverBorderColor: '#2563eb'
                }]
            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                interaction: {
                    intersect: false,
                    mode: 'index'
                },

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    y: {
                        beginAtZero: true,

                        grid: {
                            color: 'rgba(148,163,184,.15)'
                        },

                        ticks: {
                            stepSize: 1
                        }

                    },

                    x: {

                        grid: {
                            display: false
                        }

                    }

                }

            }

        });

        const statusOrder = @json($statusOrder);

        new Chart(document.getElementById('statusChart'), {
            type: 'doughnut',
            data: {
                labels: [
                    'Pending',
                    'Konsultasi',
                    'Menunggu Pembayaran',
                    'Diproses',
                    'Revisi',
                    'Selesai',
                    'Dibatalkan'
                ],
                datasets: [{
                    data: statusOrder,
                    backgroundColor: [
                        '#9CA3AF',
                        '#FBBF24',
                        '#FB923C',
                        '#3B82F6',
                        '#A855F7',
                        '#22C55E',
                        '#EF4444'
                    ]
                }]
            }
        });
    </script>

</div>

@endsection