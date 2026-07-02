@extends('layouts.admin')

@section('content')

<div class="space-y-8">

  <div class="flex flex-col md:flex-row md:items-center md:justify-between">

    <div>
      <h1 class="text-3xl font-bold text-slate-800">
        Manajemen Order
      </h1>

      <p class="text-slate-500 mt-1">
        Kelola seluruh pesanan pelanggan dengan mudah.
      </p>
    </div>

  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    {{-- Total Order --}}
    <div class="group bg-white rounded-3xl border border-slate-200 shadow-sm
                hover:-translate-y-2 hover:shadow-2xl hover:border-blue-300
                transition-all duration-300 p-6 cursor-pointer">

      <div class="flex justify-between items-start">

        <div>

          <p class="text-slate-500 text-sm">
            Total Order
          </p>

          <h2 class="text-3xl font-bold mt-2">
            {{ $orders->count() }}
          </h2>

          <p class="text-slate-400 text-sm mt-2">
            Semua pesanan
          </p>

        </div>

        <div
          class="w-14 h-14 rounded-2xl bg-blue-100 text-2xl flex items-center justify-center
                group-hover:bg-blue-600 group-hover:text-white
                group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">

          📦

        </div>

      </div>

    </div>

    {{-- Diproses --}}
    <div class="group bg-white rounded-3xl border border-slate-200 shadow-sm
                hover:-translate-y-2 hover:shadow-2xl hover:border-indigo-300
                transition-all duration-300 p-6 cursor-pointer">

      <div class="flex justify-between items-start">

        <div>

          <p class="text-slate-500 text-sm">
            Diproses
          </p>

          <h2 class="text-3xl font-bold mt-2 text-indigo-600">
            {{ $orders->where('status','diproses')->count() }}
          </h2>

          <p class="text-slate-400 text-sm mt-2">
            Sedang dikerjakan
          </p>

        </div>

        <div
          class="w-14 h-14 rounded-2xl bg-indigo-100 text-2xl flex items-center justify-center
                group-hover:bg-indigo-600 group-hover:text-white
                group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">

          ⚙️

        </div>

      </div>

    </div>

    {{-- Selesai --}}
    <div class="group bg-white rounded-3xl border border-slate-200 shadow-sm
                hover:-translate-y-2 hover:shadow-2xl hover:border-green-300
                transition-all duration-300 p-6 cursor-pointer">

      <div class="flex justify-between items-start">

        <div>

          <p class="text-slate-500 text-sm">
            Selesai
          </p>

          <h2 class="text-3xl font-bold mt-2 text-green-600">
            {{ $orders->where('status','selesai')->count() }}
          </h2>

          <p class="text-slate-400 text-sm mt-2">
            Order selesai
          </p>

        </div>

        <div
          class="w-14 h-14 rounded-2xl bg-green-100 text-2xl flex items-center justify-center
                group-hover:bg-green-600 group-hover:text-white
                group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">

          ✅

        </div>

      </div>

    </div>

    {{-- Pending --}}
    <div class="group bg-white rounded-3xl border border-slate-200 shadow-sm
                hover:-translate-y-2 hover:shadow-2xl hover:border-orange-300
                transition-all duration-300 p-6 cursor-pointer">

      <div class="flex justify-between items-start">

        <div>

          <p class="text-slate-500 text-sm">
            Pending
          </p>

          <h2 class="text-3xl font-bold mt-2 text-orange-600">
            {{ $orders->where('status','pending')->count() }}
          </h2>

          <p class="text-slate-400 text-sm mt-2">
            Menunggu proses
          </p>

        </div>

        <div
          class="w-14 h-14 rounded-2xl bg-orange-100 text-2xl flex items-center justify-center
                group-hover:bg-orange-500 group-hover:text-white
                group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">

          ⏳

        </div>

      </div>

    </div>

  </div>

  <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden">

    <div class="overflow-x-auto">

      <table class="w-full border-collapse">

        <thead class="bg-slate-50">

          <tr>

            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">#</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Customer</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Layanan</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Deadline</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Harga</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Status</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Aksi</th>

          </tr>

        </thead>

        <tbody>

          @forelse($orders as $order)

          <tr class="border-t hover:bg-slate-50 transition">

            <td class="px-6 py-5">{{ $loop->iteration }}</td>

            <td class="px-6 py-5">{{ $order->user->name }}</td>

            <td class="px-6 py-5">{{ $order->judul }}</td>

            <td class="px-6 py-5">
              <span class="bg-slate-100 text-slate-700 px-3 py-1 rounded-full text-sm">
                {{ \Carbon\Carbon::parse($order->deadline)->format('d M Y') }}
              </span>

            </td>

            <td class="px-6 py-5">
              <span class="font-bold text-green-600">
                Rp {{ number_format($order->harga,0,',','.') }}
              </span>
            </td>

            <td class="px-6 py-5">

              @php
              $badge = match($order->status){
              'pending' => 'bg-gray-100 text-gray-700',
              'konsultasi' => 'bg-yellow-100 text-yellow-700',
              'menunggu_pembayaran' => 'bg-orange-100 text-orange-700',
              'diproses' => 'bg-blue-100 text-blue-700',
              'revisi' => 'bg-purple-100 text-purple-700',
              'selesai' => 'bg-green-100 text-green-700',
              'dibatalkan' => 'bg-red-100 text-red-700',
              default => 'bg-gray-100 text-gray-700'
              };
              @endphp

              <span class="{{ $badge }} px-3 py-1 rounded-full text-sm">
                {{ ucfirst(str_replace('_',' ',$order->status)) }}
              </span>

            </td>

            <td class="p-3 text-center">

              <button
                onclick="openModal(
          '{{ addslashes($order->user->name) }}',
          '{{ addslashes($order->judul) }}',
          '{{ $order->deadline }}',
          '{{ $order->harga }}',
          '{{ ucfirst(str_replace('_',' ',$order->status)) }}',
          `{{ addslashes($order->deskripsi) }}`
        )"
                class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white transition">
                👁
              </button>

            </td>

          </tr>

          @empty

          <tr>

            <td colspan="7" class="py-20">

              <div class="text-center">

                <div class="text-7xl">
                  📦
                </div>

                <h3 class="mt-4 text-2xl font-bold text-slate-700">
                  Belum Ada Order
                </h3>

                <p class="text-slate-500 mt-2">
                  Pesanan pelanggan akan muncul di halaman ini.
                </p>

              </div>

            </td>

          </tr>

          @endforelse

        </tbody>

      </table>

      <!-- Modal -->
      <div id="detailModal"
        class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl mx-4">

          <div class="flex justify-between items-center border-b p-5">
            <h3 class="text-xl font-bold">Detail Order</h3>

            <button onclick="closeModal()"
              class="text-gray-500 hover:text-red-500 text-2xl">
              &times;
            </button>
          </div>

          <div class="p-8 space-y-6">

            <div class="grid grid-cols-2 gap-4">

              <div>
                <p class="text-gray-500 text-sm">Customer</p>
                <p id="modalCustomer" class="font-semibold"></p>
              </div>

              <div>
                <p class="text-gray-500 text-sm">Layanan</p>
                <p id="modalJudul" class="font-semibold"></p>
              </div>

              <div>
                <p class="text-gray-500 text-sm">Deadline</p>
                <p id="modalDeadline" class="font-semibold"></p>
              </div>

              <div>
                <p class="text-gray-500 text-sm">Harga</p>
                <p id="modalHarga" class="font-semibold text-green-600"></p>
              </div>

            </div>

            <div class="mt-5">
              <p class="text-gray-500 text-sm mb-2">Status</p>

              <span id="modalStatus"
                class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
              </span>
            </div>

            <div class="mt-5">
              <p class="text-gray-500 text-sm mb-2">Deskripsi</p>

              <div id="modalDeskripsi"
                class="bg-slate-50 rounded-2xl border p-5 whitespace-pre-line leading-7">
              </div>
            </div>

          </div>

          <div class="border-t p-4 flex justify-end gap-2">

            <button
              onclick="closeModal()"
              class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
              Tutup
            </button>

            <button
              class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
              Proses
            </button>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<script>
  function openModal(customer, judul, deadline, harga, status, deskripsi) {
    document.getElementById('modalCustomer').innerText = customer;
    document.getElementById('modalJudul').innerText = judul;
    document.getElementById('modalDeadline').innerText = deadline;

    document.getElementById('modalHarga').innerText =
      'Rp ' + Number(harga).toLocaleString('id-ID');

    document.getElementById('modalStatus').innerText = status;
    document.getElementById('modalDeskripsi').innerText = deskripsi;

    document.getElementById('detailModal')
      .classList.remove('hidden');

    document.getElementById('detailModal')
      .classList.add('flex');
  }

  function closeModal() {
    document.getElementById('detailModal')
      .classList.remove('flex');

    document.getElementById('detailModal')
      .classList.add('hidden');
  }
</script>

@endsection