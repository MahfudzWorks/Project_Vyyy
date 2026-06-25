@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow p-6 max-w-3xl">

  <h2 class="text-2xl font-bold mb-6">
    Edit FAQ
  </h2>

  <form action="{{ route('admin.faq.update',$faq) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">

      <label>Pertanyaan</label>

      <input
        type="text"
        name="question"
        value="{{ old('question',$faq->question) }}"
        class="w-full border rounded-lg p-3">

    </div>

    <div class="mb-4">

      <label>Jawaban</label>

      <textarea
        name="answer"
        rows="6"
        class="w-full border rounded-lg p-3">{{ old('answer',$faq->answer) }}</textarea>

    </div>

    <div class="mb-4">

      <label>Urutan</label>

      <input
        type="number"
        name="sort_order"
        value="{{ old('sort_order',$faq->sort_order) }}"
        class="w-32 border rounded-lg p-3">

    </div>

    <div class="mb-5">

      <label class="flex items-center gap-2">

        <input
          type="checkbox"
          name="is_active"
          {{ $faq->is_active ? 'checked' : '' }}>

        Aktif

      </label>

    </div>

    <button
      class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

      Update

    </button>

  </form>

</div>

@endsection