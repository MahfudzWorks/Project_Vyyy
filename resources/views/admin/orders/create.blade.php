@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow p-6 max-w-3xl">

  <h2 class="text-2xl font-bold mb-6">
    Tambah FAQ
  </h2>

  <form action="{{ route('admin.faq.store') }}" method="POST">

    @csrf

    <div class="mb-4">
      <label>Pertanyaan</label>

      <input type="text"
        name="question"
        class="w-full border rounded-lg p-3"
        required>
    </div>

    <div class="mb-4">

      <label>Jawaban</label>

      <textarea
        name="answer"
        rows="5"
        class="w-full border rounded-lg p-3"
        required></textarea>

    </div>

    <div class="mb-4">

      <label>Urutan</label>

      <input type="number"
        name="sort_order"
        value="1"
        class="w-32 border rounded-lg p-3">

    </div>

    <div class="mb-6">

      <label class="flex items-center gap-2">

        <input
          type="checkbox"
          name="is_active"
          checked>

        Aktif

      </label>

    </div>

    <button
      class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

      Simpan

    </button>

  </form>

</div>

@endsection