@extends('admin.layouts.app')

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

            <button class="bg-blue-500 text-white px-3 py-1 rounded">
              Detail
            </button>

          </td>

        </tr>

      </tbody>

    </table>

  </div>

</div>

@endsection