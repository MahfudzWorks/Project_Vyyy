<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            return;
        }

        Order::create([
            'user_id' => $user->id,
            'judul' => 'Makalah Sistem Informasi',
            'deskripsi' => 'Pembuatan makalah 10 halaman mengenai Sistem Informasi Manajemen beserta daftar pustaka.',
            'deadline' => now()->addDays(7),
            'harga' => 50000,
            'status' => 'konsultasi',
        ]);

        Order::create([
            'user_id' => $user->id,
            'judul' => 'Jurnal Penelitian',
            'deskripsi' => 'Membantu penyusunan jurnal penelitian sesuai template kampus.',
            'deadline' => now()->addDays(14),
            'harga' => 150000,
            'status' => 'diproses',
        ]);

        Order::create([
            'user_id' => $user->id,
            'judul' => 'PPT Seminar',
            'deskripsi' => 'Pembuatan presentasi seminar dengan desain profesional.',
            'deadline' => now()->addDays(3),
            'harga' => 75000,
            'status' => 'selesai',
        ]);
    }
}
