@extends('layouts.admin')

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard Admin
        </h1>

        <p class="text-gray-500 mt-1">
            Selamat datang kembali, {{ Auth::user()->name }}
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-500">
            <p class="text-gray-500 text-sm">Total Order</p>
            <h2 class="text-3xl font-bold mt-2">{{ $totalOrder ?? 0 }}</h2>
            <p class="text-green-500 text-sm mt-2">
                Semua pesanan
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-6 border-l-4 border-yellow-500">
            <p class="text-gray-500 text-sm">Konsultasi</p>
            <h2 class="text-3xl font-bold mt-2">{{ $konsultasi ?? 0 }}</h2>
            <p class="text-gray-400 text-sm mt-2">
                Menunggu respon
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-6 border-l-4 border-purple-500">
            <p class="text-gray-500 text-sm">FAQ</p>
            <h2 class="text-3xl font-bold mt-2">{{ $faq ?? 0 }}</h2>
            <p class="text-gray-400 text-sm mt-2">
                FAQ aktif
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-500">
            <p class="text-gray-500 text-sm">User</p>
            <h2 class="text-3xl font-bold mt-2">{{ $user ?? 0 }}</h2>
            <p class="text-gray-400 text-sm mt-2">
                Total pengguna
            </p>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">

            <h3 class="font-semibold mb-5">
                Statistik Order Bulanan
            </h3>

            <canvas id="orderChart"></canvas>

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
                    label: 'Jumlah Order',
                    data: orderPerMonth,
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37,99,235,.15)',
                    fill: true,
                    tension: 0.35,
                    borderWidth: 3,
                    pointRadius: 5
                }]
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