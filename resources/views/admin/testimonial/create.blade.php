@extends('layouts.admin')

@section('content')

<div class="max-w-6xl mx-auto">

  {{-- Header --}}
  <div class="mb-8 flex justify-between items-center">

    <div>

      <p class="text-sm text-slate-500">
        Dashboard / Testimonial
      </p>

      <h1 class="text-3xl font-bold text-slate-800 mt-1">
        Tambah Testimonial
      </h1>

      <p class="text-slate-500 mt-2">
        Tambahkan ulasan pelanggan yang akan tampil pada website.
      </p>

    </div>

  </div>

  <form
    action="{{ route('admin.testimonial.store') }}"
    method="POST">

    @csrf

    <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">

      {{-- Header Card --}}
      <div class="bg-gradient-to-r from-blue-600 to-cyan-500 p-8">

        <h2 class="text-2xl font-bold text-white">
          Form Testimonial
        </h2>

        <p class="text-blue-100 mt-2">
          Lengkapi seluruh data berikut.
        </p>

      </div>

      <div class="p-10 space-y-8">

        {{-- Customer --}}
        <div>

          <label class="block font-semibold mb-3">
            Customer
          </label>

          <select
            name="user_id"
            class="w-full h-14 rounded-2xl border-slate-300 px-5 focus:ring-2 focus:ring-blue-500">

            <option>Pilih Customer</option>

            @foreach($users as $user)

            <option value="{{ $user->id }}">
              {{ $user->name }}
            </option>

            @endforeach

          </select>

        </div>

        {{-- Rating --}}
        <div>

          <label class="block font-semibold mb-4">
            Rating
          </label>

          <div class="flex gap-4">

            @for($i=5;$i>=1;$i--)

            <label>

              <input
                type="radio"
                name="rating"
                value="{{ $i }}"
                class="peer hidden"
                {{ $i==5?'checked':'' }}>

              <div class="cursor-pointer rounded-2xl border-2 border-slate-200 p-5 w-24 text-center
                            peer-checked:border-blue-600
                            peer-checked:bg-blue-50
                            hover:border-blue-400 transition">

                <div class="text-3xl">
                  ⭐
                </div>

                <div class="font-bold mt-2">
                  {{ $i }}
                </div>

              </div>

            </label>

            @endfor

          </div>

        </div>

        {{-- Isi --}}
        <div>

          <label class="block font-semibold mb-3">
            Isi Testimonial
          </label>

          <textarea
            name="message"
            rows="7"
            class="w-full rounded-2xl border-slate-300 p-5 focus:ring-2 focus:ring-blue-500"
            placeholder="Tulis pengalaman pelanggan..."></textarea>

        </div>

        {{-- Status --}}
        <div>

          <label class="block font-semibold mb-3">
            Status
          </label>

          <div class="flex gap-6">

            <label
              class="flex items-center gap-3 bg-green-50 border border-green-200 rounded-xl px-5 py-4 cursor-pointer">

              <input
                type="radio"
                name="is_active"
                value="1"
                checked>

              Aktif

            </label>

            <label
              class="flex items-center gap-3 bg-red-50 border border-red-200 rounded-xl px-5 py-4 cursor-pointer">

              <input
                type="radio"
                name="is_active"
                value="0">

              Nonaktif

            </label>

          </div>

        </div>

      </div>

      {{-- Footer --}}
      <div class="bg-slate-50 px-10 py-6 flex justify-end gap-4">

        <a
          href="{{ route('admin.testimonial.index') }}"
          class="px-7 py-3 rounded-xl border border-slate-300 hover:bg-slate-100">

          Batal

        </a>

        <button
          class="px-8 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg hover:scale-105 transition">

          Simpan Testimonial

        </button>

      </div>

    </div>

  </form>

</div>

@endsection