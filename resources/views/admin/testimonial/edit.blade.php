@extends('layouts.admin')

@section('content')

<div class="max-w-6xl mx-auto">

  {{-- Header --}}
  <div class="mb-8">

    <p class="text-sm text-slate-500">
      Dashboard / Testimonial
    </p>

    <h1 class="text-3xl font-bold text-slate-800 mt-1">
      Edit Testimonial
    </h1>

    <p class="text-slate-500 mt-2">
      Perbarui testimonial pelanggan yang telah tersimpan.
    </p>

  </div>

  <form
    action="{{ route('admin.testimonial.update',$testimonial->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">

      {{-- Header Card --}}
      <div class="bg-gradient-to-r from-blue-600 to-cyan-500 p-8">

        <h2 class="text-2xl font-bold text-white">
          Form Edit Testimonial
        </h2>

        <p class="text-blue-100 mt-2">
          Perbarui informasi testimonial pelanggan.
        </p>

      </div>

      <div class="p-10 space-y-8">

        {{-- Customer --}}
        <div>

          <label class="block font-semibold mb-3 text-slate-700">
            Customer
          </label>

          <select
            name="user_id"
            class="w-full rounded-2xl border border-slate-300 px-5 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-500">

            @foreach($users as $user)

            <option
              value="{{ $user->id }}"
              {{ $testimonial->user_id == $user->id ? 'selected' : '' }}>

              {{ $user->name }}

            </option>

            @endforeach

          </select>

        </div>

        {{-- Rating --}}
        <div>

          <label class="block font-semibold mb-4 text-slate-700">
            Rating
          </label>

          <div class="grid grid-cols-5 gap-4">

            @for($i=5;$i>=1;$i--)

            <label>

              <input
                type="radio"
                name="rating"
                value="{{ $i }}"
                class="peer hidden"
                {{ $testimonial->rating == $i ? 'checked' : '' }}>

              <div
                class="cursor-pointer rounded-2xl border-2 border-slate-200 p-5 text-center transition
                                peer-checked:border-blue-600
                                peer-checked:bg-blue-50
                                hover:border-blue-400">

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

        {{-- Testimonial --}}
        <div>

          <label class="block font-semibold mb-3 text-slate-700">
            Isi Testimonial
          </label>

          <textarea
            name="message"
            rows="7"
            class="w-full rounded-2xl border border-slate-300 p-5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
            placeholder="Masukkan testimonial...">{{ old('message',$testimonial->message) }}</textarea>

        </div>

        {{-- Status --}}
        <div>

          <label class="block font-semibold mb-3 text-slate-700">
            Status
          </label>

          <div class="flex gap-5">

            <label
              class="flex items-center gap-3 bg-green-50 border border-green-200 rounded-xl px-5 py-4 cursor-pointer">

              <input
                type="radio"
                name="is_active"
                value="1"
                {{ $testimonial->is_active ? 'checked' : '' }}>

              <span class="text-green-700 font-medium">
                ✅ Aktif
              </span>

            </label>

            <label
              class="flex items-center gap-3 bg-red-50 border border-red-200 rounded-xl px-5 py-4 cursor-pointer">

              <input
                type="radio"
                name="is_active"
                value="0"
                {{ !$testimonial->is_active ? 'checked' : '' }}>

              <span class="text-red-700 font-medium">
                ❌ Nonaktif
              </span>

            </label>

          </div>

        </div>

        {{-- Info --}}
        <div class="rounded-2xl bg-amber-50 border border-amber-200 p-5">

          <h4 class="font-semibold text-amber-700">
            ✏️ Informasi
          </h4>

          <p class="text-sm text-amber-600 mt-2">
            Pastikan testimonial masih relevan sebelum diperbarui.
            Perubahan akan langsung ditampilkan apabila status aktif.
          </p>

        </div>

      </div>

      {{-- Footer --}}
      <div class="bg-slate-50 px-10 py-6 flex justify-end gap-4">

        <a
          href="{{ route('admin.testimonial.index') }}"
          class="px-7 py-3 rounded-xl border border-slate-300 hover:bg-slate-100 transition">

          Batal

        </a>

        <button
          type="submit"
          class="px-8 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-semibold shadow-lg hover:opacity-90 transition">

          ✏️ Update Testimonial

        </button>

      </div>

    </div>

  </form>

</div>

@endsection