@extends('layouts.admin')

@section('content')

<div class="max-w-6xl mx-auto">

  {{-- Header --}}
  <div class="mb-8">

    <p class="text-sm text-slate-500">
      Dashboard / FAQ
    </p>

    <h1 class="text-3xl font-bold text-slate-800 mt-1">
      Tambah FAQ
    </h1>

    <p class="text-slate-500 mt-2">
      Tambahkan pertanyaan yang akan tampil di halaman FAQ website.
    </p>

  </div>

  <form action="{{ route('admin.faq.store') }}" method="POST">

    @csrf

    <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">

      {{-- Header Card --}}
      <div class="bg-gradient-to-r from-blue-600 to-cyan-500 p-8">

        <h2 class="text-2xl font-bold text-white">
          Form FAQ
        </h2>

        <p class="text-blue-100 mt-2">
          Lengkapi data pertanyaan dan jawaban.
        </p>

      </div>

      <div class="p-10 space-y-8">

        {{-- Pertanyaan --}}
        <div>

          <label class="block font-semibold mb-3">
            Pertanyaan
          </label>

          <input
            type="text"
            name="question"
            class="w-full h-14 rounded-2xl border-slate-300 px-5 focus:ring-2 focus:ring-blue-500"
            placeholder="Masukkan pertanyaan"
            required>

        </div>

        {{-- Jawaban --}}
        <div>

          <label class="block font-semibold mb-3">
            Jawaban
          </label>

          <textarea
            name="answer"
            rows="7"
            class="w-full rounded-2xl border-slate-300 p-5 focus:ring-2 focus:ring-blue-500"
            placeholder="Masukkan jawaban"
            required></textarea>

        </div>

        {{-- Urutan --}}
        <div>

          <label class="block font-semibold mb-3">
            Urutan
          </label>

          <input
            type="number"
            name="sort_order"
            value="1"
            class="w-40 h-14 rounded-2xl border-slate-300 px-5 focus:ring-2 focus:ring-blue-500">

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
                type="checkbox"
                name="is_active"
                checked>

              Aktif

            </label>

          </div>

        </div>

      </div>

      {{-- Footer --}}
      <div class="bg-slate-50 px-10 py-6 flex justify-end gap-4">

        <a
          href="{{ route('admin.faq.index') }}"
          class="px-7 py-3 rounded-xl border border-slate-300 hover:bg-slate-100">

          Batal

        </a>

        <button
          class="px-8 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg hover:scale-105 transition">

          Simpan FAQ

        </button>

      </div>

    </div>

  </form>

</div>

@endsection