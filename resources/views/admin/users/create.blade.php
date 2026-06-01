@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <div class="flex justify-between items-center mb-5">

        <h1 class="text-2xl font-bold">Tambah User</h1>

        <a href="{{ route('admin.users.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">

            ← Kembali

        </a>

    </div>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label>Nama</label>
            <input type="text" name="name"
                class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email"
                class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>Password</label>
            <input type="password" name="password"
                class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>Role</label>
            <select name="role" class="w-full border p-2 rounded">
                <option value="admin">Admin</option>
                <option value="customer">Customer</option>
            </select>
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Simpan
        </button>

    </form>

</div>

@endsection