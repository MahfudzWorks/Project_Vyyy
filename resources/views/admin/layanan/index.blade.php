@extends('layouts.admin')

@section('content')

<div class="space-y-8">

  {{-- Header --}}
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

    <div>

      <h1 class="text-3xl font-bold text-slate-800">
        Manajemen Layanan
      </h1>

      <p class="text-slate-500 mt-1">
        Kelola seluruh layanan yang tersedia pada website.
      </p>

    </div>

    <a href="{{ route('admin.layanan.create') }}"
      class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl
            bg-gradient-to-r from-blue-600 to-cyan-500
            text-white shadow-lg hover:scale-105
            transition duration-300">

      ➕ Tambah Layanan

    </a>

  </div>

  {{-- Statistik --}}
  <div class="grid md:grid-cols-3 gap-6">

    {{-- Total --}}
    <div class="group bg-white rounded-3xl shadow-lg border border-slate-100 p-6
            hover:-translate-y-2 hover:shadow-2xl transition duration-300">

      <div class="flex justify-between">

        <div>

          <p class="text-slate-500">
            Total Layanan
          </p>

          <h2 class="text-4xl font-bold mt-2 text-slate-800">

            {{ $services->count() }}

          </h2>

        </div>

        <div
          class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl
                    group-hover:bg-blue-600 group-hover:text-white transition">

          📦

        </div>

      </div>

    </div>

    {{-- Aktif --}}
    <div class="group bg-white rounded-3xl shadow-lg border border-slate-100 p-6
            hover:-translate-y-2 hover:shadow-2xl transition duration-300">

      <div class="flex justify-between">

        <div>

          <p class="text-slate-500">
            Aktif
          </p>

          <h2 class="text-4xl font-bold mt-2 text-green-600">

            {{ $services->where('is_active',1)->count() }}

          </h2>

        </div>

        <div
          class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl
                    group-hover:bg-green-600 group-hover:text-white transition">

          ✅

        </div>

      </div>

    </div>

    {{-- Nonaktif --}}
    <div class="group bg-white rounded-3xl shadow-lg border border-slate-100 p-6
            hover:-translate-y-2 hover:shadow-2xl transition duration-300">

      <div class="flex justify-between">

        <div>

          <p class="text-slate-500">
            Nonaktif
          </p>

          <h2 class="text-4xl font-bold mt-2 text-red-600">

            {{ $services->where('is_active',0)->count() }}

          </h2>

        </div>

        <div
          class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center text-2xl
                    group-hover:bg-red-600 group-hover:text-white transition">

          🚫

        </div>

      </div>

    </div>

  </div>

  {{-- Table --}}
  <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden">

    <div class="overflow-x-auto">

      <table class="min-w-full">

        <thead class="bg-slate-50">

          <tr>

            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
              #
            </th>

            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
              Gambar
            </th>

            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
              Nama Layanan
            </th>

            <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
              Harga
            </th>

            <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
              Status
            </th>

            <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
              Aksi
            </th>

          </tr>

        </thead>

        <tbody>

          @forelse($services as $service)

          <tr class="border-t hover:bg-slate-50 transition">

            <td class="px-6 py-5 font-semibold text-slate-500">

              {{ $loop->iteration }}

            </td>

            <td class="px-6 py-5">

              @if($service->image)

              <img
                src="{{ asset('storage/'.$service->image) }}"
                class="w-16 h-16 rounded-xl object-cover shadow">

              @else

              <div
                class="w-16 h-16 rounded-xl bg-slate-100 flex items-center justify-center text-2xl">

                🖼️

              </div>

              @endif

            </td>

            <td class="px-6 py-5">

              <p class="font-semibold text-slate-800">

                {{ $service->title }}

              </p>

              <p class="text-sm text-slate-500 mt-1">

                {{ Str::limit($service->description,60) }}

              </p>

            </td>

            <td class="px-6 py-5 text-center">

              <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full">

                Rp {{ number_format($service->price,0,',','.') }}

              </span>

            </td>

            <td class="px-6 py-5 text-center">

              @if($service->is_active)

              <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">

                Aktif

              </span>

              @else

              <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full">

                Nonaktif

              </span>

              @endif

            </td>

            <td class="px-6 py-5">

              <div class="flex justify-center gap-2">

                <button
                  class="w-10 h-10 rounded-xl bg-blue-100
                                hover:bg-blue-600 hover:text-white transition">

                  👁

                </button>

                <a
                  href="{{ route('admin.layanan.edit',$service) }}"
                  class="w-10 h-10 rounded-xl bg-yellow-100
                                hover:bg-yellow-500 hover:text-white
                                transition flex items-center justify-center">

                  ✏️

                </a>

                <form
                  action="{{ route('admin.layanan.destroy',$service) }}"
                  method="POST">

                  @csrf
                  @method('DELETE')

                  <button
                    onclick="return confirm('Hapus layanan ini?')"
                    class="w-10 h-10 rounded-xl bg-red-100
                                    hover:bg-red-500 hover:text-white transition">

                    🗑

                  </button>

                </form>

              </div>

            </td>

          </tr>

          @empty

          <tr>

            <td colspan="6" class="py-20">

              <div class="text-center">

                <div class="text-7xl">

                  📦

                </div>

                <h3 class="mt-5 text-2xl font-bold text-slate-700">

                  Belum Ada Layanan

                </h3>

                <p class="text-slate-500 mt-2">

                  Tambahkan layanan pertama agar pelanggan dapat melakukan pemesanan.

                </p>

              </div>

            </td>

          </tr>

          @endforelse

        </tbody>

      </table>

    </div>

  </div>

</div>

@endsection