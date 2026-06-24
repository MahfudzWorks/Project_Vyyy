@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

  <div class="flex justify-between items-center mb-6">

    <h2 class="text-2xl font-bold">
      Manajemen Order
    </h2>

  </div>

  <div class="overflow-x-auto">

    <table class="w-full border-collapse">

      <thead>

        <tr class="bg-gray-100">

          <th class="p-3 text-left">#</th>
          <th class="p-3 text-left">Customer</th>
          <th class="p-3 text-left">Layanan</th>
          <th class="p-3 text-left">Deadline</th>
          <th class="p-3 text-left">Harga</th>
          <th class="p-3 text-left">Status</th>
          <th class="p-3 text-center">Aksi</th>

        </tr>

      </thead>

      <tbody>

        @forelse($orders as $order)

        <tr class="border-b">

          <td class="p-3">{{ $loop->iteration }}</td>

          <td class="p-3">{{ $order->user->name }}</td>

          <td class="p-3">{{ $order->judul }}</td>

          <td class="p-3">
            {{ \Carbon\Carbon::parse($order->deadline)->format('d M Y') }}
          </td>

          <td class="p-3">
            Rp {{ number_format($order->harga, 0, ',', '.') }}
          </td>

          <td class="p-3">

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
              class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg">
              Detail
            </button>

          </td>

        </tr>

        @empty

        <tr>
          <td colspan="7" class="text-center p-6 text-gray-500">
            Belum ada order
          </td>
        </tr>

        @endforelse

      </tbody>

    </table>

    <!-- Modal -->
    <div id="detailModal"
      class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

      <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl mx-4">

        <div class="flex justify-between items-center border-b p-5">
          <h3 class="text-xl font-bold">Detail Order</h3>

          <button onclick="closeModal()"
            class="text-gray-500 hover:text-red-500 text-2xl">
            &times;
          </button>
        </div>

        <div class="p-6">

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
              class="bg-gray-50 border rounded-lg p-4">
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