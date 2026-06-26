@extends('layouts.admin')

@section('content')

<div class="space-y-8">

  {{-- Header --}}
  <div class="flex flex-col md:flex-row md:items-center md:justify-between">

    <div>
      <h1 class="text-3xl font-bold text-slate-800">
        Manajemen FAQ
      </h1>

      <p class="text-slate-500 mt-1">
        Kelola seluruh pertanyaan yang sering diajukan pelanggan.
      </p>
    </div>

    <a href="{{ route('admin.faq.create') }}"
      class="mt-4 md:mt-0 inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg hover:scale-105 transition">

      ➕ Tambah FAQ

    </a>

  </div>

  {{-- Statistik --}}
  <div class="grid md:grid-cols-3 gap-6">

    <div class="bg-white rounded-3xl shadow-lg p-6 border border-slate-100">

      <div class="flex justify-between">

        <div>

          <p class="text-slate-500">
            Total FAQ
          </p>

          <h2 class="text-4xl font-bold mt-2 text-slate-800">
            {{ $faqs->count() }}
          </h2>

        </div>

        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">

          ❓

        </div>

      </div>

    </div>

    <div class="bg-white rounded-3xl shadow-lg p-6 border border-slate-100">

      <div class="flex justify-between">

        <div>

          <p class="text-slate-500">
            FAQ Aktif
          </p>

          <h2 class="text-4xl font-bold mt-2 text-green-600">
            {{ $faqs->where('is_active',1)->count() }}
          </h2>

        </div>

        <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl">

          ✅

        </div>

      </div>

    </div>

    <div class="bg-white rounded-3xl shadow-lg p-6 border border-slate-100">

      <div class="flex justify-between">

        <div>

          <p class="text-slate-500">
            Nonaktif
          </p>

          <h2 class="text-4xl font-bold mt-2 text-red-600">
            {{ $faqs->where('is_active',0)->count() }}
          </h2>

        </div>

        <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center text-2xl">

          🚫

        </div>

      </div>

    </div>

  </div>

  {{-- Card --}}
  <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden">

    <div class="overflow-x-auto">

      <table class="min-w-full">

        <thead class="bg-slate-50">

          <tr>

            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
              #
            </th>

            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
              Pertanyaan
            </th>

            <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
              Urutan
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

          @forelse($faqs as $faq)

          <tr class="border-t hover:bg-slate-50 transition">

            <td class="px-6 py-5 font-semibold text-slate-500">
              {{ $loop->iteration }}
            </td>

            <td class="px-6 py-5">

              <p class="font-semibold text-slate-800">

                {{ $faq->question }}

              </p>

            </td>

            <td class="px-6 py-5 text-center">

              <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

                {{ $faq->sort_order }}

              </span>

            </td>

            <td class="px-6 py-5 text-center">

              @if($faq->is_active)

              <span class="px-4 py-1 rounded-full bg-green-100 text-green-700 font-medium">

                Aktif

              </span>

              @else

              <span class="px-4 py-1 rounded-full bg-red-100 text-red-700 font-medium">

                Nonaktif

              </span>

              @endif

            </td>

            <td class="px-6 py-5">

              <div class="flex justify-center gap-2">

                <button
                  onclick="showDetail(
                                    `{{ addslashes($faq->question) }}`,
                                    `{{ addslashes($faq->answer) }}`)"
                  class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white transition">

                  👁

                </button>

                <a href="{{ route('admin.faq.edit',$faq->id) }}"
                  class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-600 hover:bg-yellow-500 hover:text-white transition flex items-center justify-center">

                  ✏️

                </a>

                <form
                  action="{{ route('admin.faq.destroy',$faq->id) }}"
                  method="POST"
                  onsubmit="return confirm('Hapus FAQ ini?')">

                  @csrf
                  @method('DELETE')

                  <button
                    class="w-10 h-10 rounded-xl bg-red-100 text-red-600 hover:bg-red-500 hover:text-white transition">

                    🗑

                  </button>

                </form>

              </div>

            </td>

          </tr>

          @empty

          <tr>

            <td colspan="5" class="py-20">

              <div class="text-center">

                <div class="text-7xl">

                  ❓

                </div>

                <h3 class="mt-4 text-2xl font-bold text-slate-700">

                  Belum Ada FAQ

                </h3>

                <p class="text-slate-500 mt-2">

                  Tambahkan FAQ pertama agar pelanggan lebih mudah menemukan informasi.

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

{{-- Modal --}}
<div id="faqModal"
  class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 backdrop-blur-sm">

  <div class="bg-white rounded-3xl w-full max-w-2xl shadow-2xl">

    <div class="flex justify-between items-center p-6 border-b">

      <h3 class="text-2xl font-bold">

        Detail FAQ

      </h3>

      <button
        onclick="closeModal()"
        class="text-3xl text-gray-400 hover:text-red-500">

        ×

      </button>

    </div>

    <div class="p-8 space-y-6">

      <div>

        <p class="text-sm text-slate-500 mb-2">

          Pertanyaan

        </p>

        <h4 id="faqQuestion"
          class="font-bold text-xl text-slate-800">
        </h4>

      </div>

      <div>

        <p class="text-sm text-slate-500 mb-2">

          Jawaban

        </p>

        <div id="faqAnswer"
          class="bg-slate-50 rounded-2xl border p-5 whitespace-pre-line leading-7">
        </div>

      </div>

    </div>

    <div class="border-t p-5 flex justify-end">

      <button
        onclick="closeModal()"
        class="px-5 py-2 rounded-xl bg-slate-200 hover:bg-slate-300">

        Tutup

      </button>

    </div>

  </div>

</div>

<script>
  function showDetail(question, answer) {

    document.getElementById('faqQuestion').innerText = question;
    document.getElementById('faqAnswer').innerText = answer;

    document.getElementById('faqModal').classList.remove('hidden');
    document.getElementById('faqModal').classList.add('flex');

  }

  function closeModal() {

    document.getElementById('faqModal').classList.remove('flex');
    document.getElementById('faqModal').classList.add('hidden');

  }
</script>

@endsection