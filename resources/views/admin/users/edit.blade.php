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

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Nama</label>
            <input type="text" name="name"
                value="{{ $user->name }}"
                class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email"
                value="{{ $user->email }}"
                class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Role</label>
            <select name="role" class="w-full border p-2 rounded">

                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

                <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>
                    Customer
                </option>

            </select>
        </div>

        <button class="bg-yellow-500 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>

@endsection