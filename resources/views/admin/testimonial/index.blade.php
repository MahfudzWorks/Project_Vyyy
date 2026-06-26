@extends('layouts.admin')

@section('content')

<div class="space-y-8">

  {{-- Header --}}
  <div
    class="bg-gradient-to-r from-blue-600 via-cyan-500 to-indigo-600 rounded-3xl p-8 text-white shadow-xl">

    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-6">

      <div>

        <h1 class="text-3xl font-bold">
          ⭐ Manajemen Testimonial
        </h1>

        <p class="text-blue-100 mt-2">
          Kelola testimonial pelanggan yang tampil pada website.
        </p>

      </div>

      <a href="{{ route('admin.testimonial.create') }}"
        class="bg-white text-blue-600 font-semibold px-6 py-3 rounded-xl hover:scale-105 transition shadow">

        + Tambah Testimonial

      </a>

    </div>

  </div>

  {{-- Statistik --}}
  <div class="grid md:grid-cols-3 gap-5">

    <div class="bg-white rounded-2xl shadow p-6">

      <p class="text-gray-500 text-sm">
        Total Testimonial
      </p>

      <h2 class="text-3xl font-bold text-slate-800 mt-2">
        {{ $testimonials->count() }}
      </h2>

    </div>

    <div class="bg-white rounded-2xl shadow p-6">

      <p class="text-gray-500 text-sm">
        Aktif
      </p>

      <h2 class="text-3xl font-bold text-green-600 mt-2">
        {{ $testimonials->where('is_active',1)->count() }}
      </h2>

    </div>

    <div class="bg-white rounded-2xl shadow p-6">

      <p class="text-gray-500 text-sm">
        Nonaktif
      </p>

      <h2 class="text-3xl font-bold text-red-500 mt-2">
        {{ $testimonials->where('is_active',0)->count() }}
      </h2>

    </div>

  </div>

  {{-- Search --}}
  <div class="bg-white rounded-2xl shadow p-5">

    <div class="flex flex-col md:flex-row gap-4">

      <input
        type="text"
        id="searchTestimonial"
        placeholder="Cari customer..."
        class="flex-1 rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500">

      <select
        id="statusFilter"
        class="rounded-xl border-slate-300">

        <option value="">
          Semua Status
        </option>

        <option value="aktif">
          Aktif
        </option>

        <option value="nonaktif">
          Nonaktif
        </option>

      </select>

    </div>

  </div>

  {{-- Card --}}
  <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-6">

    @forelse($testimonials as $testimonial)

    <div
      class="testimonial-card bg-white rounded-3xl shadow hover:shadow-2xl transition duration-300 overflow-hidden border border-slate-100">

      {{-- Top --}}
      <div class="bg-gradient-to-r from-blue-600 to-cyan-500 h-20 relative">

        <div
          class="absolute -bottom-8 left-6 w-16 h-16 rounded-full bg-white p-1 shadow">

          <div
            class="w-full h-full rounded-full bg-blue-600 text-white flex items-center justify-center text-2xl font-bold">

            {{ strtoupper(substr($testimonial->user->name,0,1)) }}

          </div>

        </div>

      </div>

      <div class="pt-12 p-6">

        <div class="flex justify-between">

          <div>

            <h3 class="font-bold text-lg customer-name">

              {{ $testimonial->user->name }}

            </h3>

            <p class="text-sm text-gray-500">

              {{ $testimonial->created_at->format('d M Y') }}

            </p>

          </div>

          @if($testimonial->is_active)

          <span
            class="status-badge bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">

            Aktif

          </span>

          @else

          <span
            class="status-badge bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">

            Nonaktif

          </span>

          @endif

        </div>

        {{-- Rating --}}
        <div class="flex gap-1 mt-5">

          @for($i=1;$i<=5;$i++)

            <span class="{{ $i <= $testimonial->rating ? 'text-yellow-400':'text-gray-300' }}">
            ★
            </span>

            @endfor

        </div>

        {{-- Message --}}
        <p class="mt-5 text-gray-600 italic leading-relaxed line-clamp-4">

          "{{ $testimonial->message }}"

        </p>

        {{-- Button --}}
        <div class="flex gap-3 mt-7">

          <a href="{{ route('admin.testimonial.edit',$testimonial) }}"
            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white rounded-xl py-2 text-center transition">

            ✏ Edit

          </a>

          <form
            action="{{ route('admin.testimonial.destroy',$testimonial) }}"
            method="POST"
            class="flex-1"
            onsubmit="return confirm('Hapus testimonial?')">

            @csrf
            @method('DELETE')

            <button
              class="w-full bg-red-500 hover:bg-red-600 text-white rounded-xl py-2 transition">

              🗑 Hapus

            </button>

          </form>

        </div>

      </div>

    </div>

    @empty

    <div class="col-span-full">

      <div class="bg-white rounded-3xl shadow p-16 text-center">

        <div class="text-7xl">

          ⭐

        </div>

        <h3 class="text-2xl font-bold mt-5">

          Belum Ada Testimonial

        </h3>

        <p class="text-gray-500 mt-2">

          Tambahkan testimonial pertama agar website terlihat lebih terpercaya.

        </p>

        <a
          href="{{ route('admin.testimonial.create') }}"
          class="inline-block mt-8 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

          Tambah Testimonial

        </a>

      </div>

    </div>

    @endforelse

  </div>

</div>

<script>
  const search = document.getElementById('searchTestimonial');
  const filter = document.getElementById('statusFilter');

  function doFilter() {

    const keyword = search.value.toLowerCase();

    document.querySelectorAll('.testimonial-card').forEach(card => {

      const nama = card.querySelector('.customer-name').innerText.toLowerCase();

      const status = card.querySelector('.status-badge').innerText.toLowerCase();

      const cocokNama = nama.includes(keyword);

      const cocokStatus = filter.value == '' || status == filter.value;

      card.style.display = (cocokNama && cocokStatus) ? 'block' : 'none';

    });

  }

  search.addEventListener('keyup', doFilter);

  filter.addEventListener('change', doFilter);
</script>

@endsection