<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::insert([
            [
                'question' => 'Bagaimana cara melakukan pemesanan?',
                'answer' => 'Silakan pilih layanan, isi formulir pemesanan, lalu kirim order. Admin akan menghubungi Anda untuk proses selanjutnya.',
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'question' => 'Berapa lama proses pengerjaan?',
                'answer' => 'Lama pengerjaan menyesuaikan jenis layanan dan tingkat kesulitan. Estimasi akan diberikan setelah order diterima.',
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'question' => 'Apakah bisa melakukan revisi?',
                'answer' => 'Ya. Revisi dapat dilakukan sesuai ketentuan yang telah disepakati pada saat pemesanan.',
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'question' => 'Bagaimana metode pembayarannya?',
                'answer' => 'Pembayaran dilakukan melalui transfer bank atau e-wallet yang tersedia.',
                'sort_order' => 4,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'question' => 'Bagaimana jika order dibatalkan?',
                'answer' => 'Pembatalan dapat dilakukan sebelum pengerjaan dimulai. Ketentuan pengembalian dana mengikuti kebijakan yang berlaku.',
                'sort_order' => 5,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
