@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Manajemen User
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola seluruh akun pengguna yang terdaftar pada sistem.
            </p>
        </div>

        <a href="{{ route('admin.users.create') }}"
            class="mt-4 md:mt-0 inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg hover:scale-105 transition">

            ➕ Tambah User

        </a>

    </div>

    {{-- Alert --}}
    @if(session('success'))
    <div class="bg-green-100 border border-green-200 text-green-700 rounded-2xl px-5 py-4 shadow">
        {{ session('success') }}
    </div>
    @endif

    {{-- Statistik --}}
    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-white rounded-3xl shadow-lg border border-slate-100 p-6">

            <div class="flex justify-between">

                <div>

                    <p class="text-slate-500">
                        Total User
                    </p>

                    <h2 class="text-4xl font-bold text-slate-800 mt-2">
                        {{ $users->count() }}
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">
                    👥
                </div>

            </div>

        </div>

        <div class="bg-white rounded-3xl shadow-lg border border-slate-100 p-6">

            <div class="flex justify-between">

                <div>

                    <p class="text-slate-500">
                        Admin
                    </p>

                    <h2 class="text-4xl font-bold text-red-600 mt-2">
                        {{ $users->where('role','admin')->count() }}
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center text-2xl">
                    👑
                </div>

            </div>

        </div>

        <div class="bg-white rounded-3xl shadow-lg border border-slate-100 p-6">

            <div class="flex justify-between">

                <div>

                    <p class="text-slate-500">
                        Customer
                    </p>

                    <h2 class="text-4xl font-bold text-blue-600 mt-2">
                        {{ $users->where('role','user')->count() }}
                    </h2>

                </div>

                <div class="w-14 h-14 rounded-2xl bg-cyan-100 flex items-center justify-center text-2xl">
                    🙋
                </div>

            </div>

        </div>

    </div>

    {{-- Card Table --}}
    <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            #
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Nama
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Email
                        </th>

                        <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                            Role
                        </th>

                        <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($users as $user)

                    <tr class="border-t hover:bg-slate-50 transition">

                        <td class="px-6 py-5 text-slate-500 font-semibold">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-5 font-semibold text-slate-800">
                            {{ $user->name }}
                        </td>

                        <td class="px-6 py-5 text-slate-600">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-5 text-center">

                            @if($user->role=='admin')

                            <span class="px-4 py-1 rounded-full bg-red-100 text-red-700 font-medium">
                                Admin
                            </span>

                            @else

                            <span class="px-4 py-1 rounded-full bg-blue-100 text-blue-700 font-medium">
                                User
                            </span>

                            @endif

                        </td>

                        <td class="px-6 py-5">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('admin.users.edit',$user->id) }}"
                                    class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-600 hover:bg-yellow-500 hover:text-white transition flex items-center justify-center">

                                    ✏️

                                </a>

                                <form action="{{ route('admin.users.destroy',$user->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus user ini?')">

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
                                    👥
                                </div>

                                <h3 class="mt-4 text-2xl font-bold text-slate-700">
                                    Belum Ada User
                                </h3>

                                <p class="text-slate-500 mt-2">
                                    Tambahkan user pertama untuk mulai menggunakan sistem.
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