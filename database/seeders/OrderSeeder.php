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

        $orders = [
            ['Makalah Sistem Informasi', 'Pembuatan makalah Sistem Informasi Manajemen.', 7, 50000, 'konsultasi'],
            ['Jurnal Penelitian', 'Penyusunan jurnal penelitian sesuai template.', 14, 150000, 'diproses'],
            ['PPT Seminar', 'Desain presentasi seminar profesional.', 3, 75000, 'selesai'],
            ['Proposal Skripsi', 'Penyusunan proposal Bab 1 sampai Bab 3.', 10, 250000, 'pending'],
            ['Artikel Ilmiah', 'Artikel ilmiah minimal 3000 kata.', 5, 120000, 'diproses'],
            ['Resume Buku', 'Resume buku 20 halaman.', 4, 60000, 'selesai'],
            ['Essay Pendidikan', 'Essay bertema pendidikan karakter.', 6, 45000, 'revisi'],
            ['Laporan PKL', 'Penyusunan laporan praktik kerja lapangan.', 12, 175000, 'menunggu_pembayaran'],
            ['Desain Poster', 'Poster promosi kegiatan kampus.', 2, 40000, 'selesai'],
            ['Analisis Data SPSS', 'Analisis data menggunakan SPSS.', 9, 180000, 'diproses'],
            ['Business Plan', 'Pembuatan proposal business plan.', 8, 140000, 'pending'],
            ['Terjemahan Jurnal', 'Translate jurnal Inggris ke Indonesia.', 5, 95000, 'selesai'],
            ['Editing Skripsi', 'Editing tata bahasa dan format.', 4, 80000, 'revisi'],
            ['PowerPoint Sidang', 'Slide sidang skripsi premium.', 2, 65000, 'diproses'],
            ['Makalah Pancasila', 'Makalah mata kuliah Pancasila.', 7, 55000, 'dibatalkan'],
            ['Laporan Keuangan', 'Penyusunan laporan keuangan perusahaan.', 11, 160000, 'konsultasi'],
            ['Website Company Profile', 'Pembuatan website company profile.', 20, 850000, 'diproses'],
            ['Desain Logo', 'Logo UMKM modern.', 3, 90000, 'selesai'],
            ['CV ATS Friendly', 'Pembuatan CV ATS Friendly.', 1, 35000, 'selesai'],
            ['Landing Page UMKM', 'Landing page responsif menggunakan Laravel.', 15, 650000, 'pending'],
        ];

        foreach ($orders as $index => $order) {
            Order::create([
                'user_id'     => $user->id,
                'judul'       => $order[0],
                'deskripsi'   => $order[1],
                'deadline'    => now()->addDays($order[2]),
                'harga'       => $order[3],
                'status'      => $order[4],
                'created_at'  => now()->subDays(rand(0, 330)),
                'updated_at'  => now(),
            ]);
        }
    }
}
