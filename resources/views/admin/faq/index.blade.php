@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Manajemen FAQ</h2>

    <a href="{{ route('admin.faq.create') }}"
      class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
      + Tambah FAQ
    </a>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full border-collapse">

      <thead>
        <tr class="bg-gray-100">
          <th class="p-3 text-left">#</th>
          <th class="p-3 text-left">Pertanyaan</th>
          <th class="p-3 text-center">Urutan</th>
          <th class="p-3 text-center">Status</th>
          <th class="p-3 text-center">Aksi</th>
        </tr>
      </thead>

      <tbody>

        @forelse($faqs as $faq)

        <tr class="border-b">

          <td class="p-3">{{ $loop->iteration }}</td>

          <td class="p-3">
            {{ $faq->question }}
          </td>

          <td class="p-3 text-center">
            {{ $faq->sort_order }}
          </td>

          <td class="p-3 text-center">

            @if($faq->is_active)

            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
              Aktif
            </span>

            @else

            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
              Nonaktif
            </span>

            @endif

          </td>

          <td class="p-3">

            <div class="flex justify-center gap-2">

              <button
                onclick="showDetail(
                                    `{{ addslashes($faq->question) }}`,
                                    `{{ addslashes($faq->answer) }}`
                                )"
                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg">
                Detail
              </button>

              <a href="{{ route('admin.faq.edit',$faq->id) }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg">
                Edit
              </a>

              <form action="{{ route('admin.faq.destroy',$faq->id) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin menghapus FAQ ini?')">

                @csrf
                @method('DELETE')

                <button
                  class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg">
                  Hapus
                </button>

              </form>

            </div>

          </td>

        </tr>

        @empty

        <tr>
          <td colspan="5" class="text-center py-8 text-gray-500">
            Belum ada data FAQ
          </td>
        </tr>

        @endforelse

      </tbody>

    </table>
  </div>

</div>


<!-- Modal -->
<div id="faqModal"
  class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

  <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl">

    <div class="flex justify-between items-center border-b p-5">

      <h3 class="text-xl font-bold">
        Detail FAQ
      </h3>

      <button
        onclick="closeModal()"
        class="text-2xl text-gray-500 hover:text-red-500">
        &times;
      </button>

    </div>

    <div class="p-6">

      <div class="mb-5">

        <p class="text-sm text-gray-500 mb-2">
          Pertanyaan
        </p>

        <p id="faqQuestion"
          class="font-semibold">
        </p>

      </div>

      <div>

        <p class="text-sm text-gray-500 mb-2">
          Jawaban
        </p>

        <div id="faqAnswer"
          class="bg-gray-50 border rounded-lg p-4 whitespace-pre-line">
        </div>

      </div>

    </div>

    <div class="border-t p-4 flex justify-end">

      <button
        onclick="closeModal()"
        class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg">
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