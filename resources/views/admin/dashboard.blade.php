@extends('layouts.admin')

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard Admin
        </h1>

        <p class="text-gray-500 mt-1">
            Selamat datang kembali, {{ Auth::user()->name }}
        </p>
    </div>

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

</div>

@endsection