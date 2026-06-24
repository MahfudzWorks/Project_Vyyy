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

        <tr class="border-b">

          <td class="p-3">1</td>
          <td class="p-3">Mahfudz</td>
          <td class="p-3">Makalah</td>
          <td class="p-3">10 Juni 2026</td>
          <td class="p-3">Rp 50.000</td>

          <td class="p-3">
            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
              Konsultasi
            </span>
          </td>

          <td class="p-3 text-center">

            <button
              onclick="openModal()"
              class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg">
              Detail
            </button>

          </td>

        </tr>

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
              <p class="font-semibold">Mahfudz</p>
            </div>

            <div>
              <p class="text-gray-500 text-sm">Layanan</p>
              <p class="font-semibold">Makalah</p>
            </div>

            <div>
              <p class="text-gray-500 text-sm">Deadline</p>
              <p class="font-semibold">10 Juni 2026</p>
            </div>

            <div>
              <p class="text-gray-500 text-sm">Harga</p>
              <p class="font-semibold text-green-600">
                Rp 50.000
              </p>
            </div>

          </div>

          <div class="mt-5">
            <p class="text-gray-500 text-sm mb-2">Status</p>

            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
              Konsultasi
            </span>
          </div>

          <div class="mt-5">
            <p class="text-gray-500 text-sm mb-2">Deskripsi</p>

            <div class="bg-gray-50 border rounded-lg p-4">
              Pembuatan makalah 10 halaman dengan tema Sistem Informasi Manajemen.
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
  function openModal() {
    const modal = document.getElementById('detailModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeModal() {
    const modal = document.getElementById('detailModal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
  }
</script>

@endsection