@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center mb-5">

        <h1 class="text-2xl font-bold">
            Data User
        </h1>

        <a href="{{ route('admin.users.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded-lg">

            + Tambah User

        </a>

    </div>

    {{-- ALERT --}}
    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <table class="w-full border">

        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Nama</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Role</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @foreach($users as $user)

            <tr class="border-b">

                <td class="p-3">{{ $user->name }}</td>
                <td class="p-3">{{ $user->email }}</td>

                <td class="p-3">
                    <span class="px-2 py-1 rounded text-white text-sm
                        {{ $user->role == 'admin' ? 'bg-red-500' : 'bg-blue-500' }}">
                        {{ $user->role }}
                    </span>
                </td>

                <td class="p-3 text-center space-x-2">

                    <a href="{{ route('admin.users.edit', $user->id) }}"
                        class="bg-yellow-500 text-white px-3 py-1 rounded">

                        Edit

                    </a>

                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                        method="POST"
                        class="inline">

                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 text-white px-3 py-1 rounded">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection