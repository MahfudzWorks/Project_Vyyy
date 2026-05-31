@extends('layouts.admin')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard Admin
        </h1>

        <p class="text-gray-500 mt-1">
            Selamat datang kembali, {{ Auth::user()->name }}
        </p>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-white shadow rounded-xl p-5">
            <h3 class="text-gray-500 text-sm">Total Order</h3>
            <p class="text-3xl font-bold mt-2">0</p>
        </div>

        <div class="bg-white shadow rounded-xl p-5">
            <h3 class="text-gray-500 text-sm">Konsultasi Masuk</h3>
            <p class="text-3xl font-bold mt-2">0</p>
        </div>

        <div class="bg-white shadow rounded-xl p-5">
            <h3 class="text-gray-500 text-sm">Layanan</h3>
            <p class="text-3xl font-bold mt-2">0</p>
        </div>

        <div class="bg-white shadow rounded-xl p-5">
            <h3 class="text-gray-500 text-sm">Testimoni</h3>
            <p class="text-3xl font-bold mt-2">0</p>
        </div>

    </div>

    {{-- Quick Menu --}}
    <div class="bg-white shadow rounded-xl p-6">

        <h2 class="text-xl font-semibold mb-4">
            Menu Cepat
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">

            <a href="#"
                class="bg-blue-500 text-white p-4 rounded-lg text-center hover:bg-blue-600 transition">
                Kelola Layanan
            </a>

            <a href="#"
                class="bg-green-500 text-white p-4 rounded-lg text-center hover:bg-green-600 transition">
                Kelola Order
            </a>

            <a href="#"
                class="bg-purple-500 text-white p-4 rounded-lg text-center hover:bg-purple-600 transition">
                Kelola FAQ
            </a>

            <a href="#"
                class="bg-orange-500 text-white p-4 rounded-lg text-center hover:bg-orange-600 transition">
                Kelola Testimoni
            </a>

        </div>

    </div>

    {{-- Logout --}}
    <div class="bg-white shadow rounded-xl p-6">

        <h2 class="text-xl font-semibold mb-4">
            Akun
        </h2>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg">
                Logout
            </button>
        </form>

    </div>

</div>

@endsection