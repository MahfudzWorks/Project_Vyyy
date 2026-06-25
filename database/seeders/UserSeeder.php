<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        $users = [
            ['Mahfudz Alfanani', 'mahfudz@gmail.com'],
            ['Ahmad Fauzi', 'ahmad@gmail.com'],
            ['Siti Aisyah', 'aisyah@gmail.com'],
            ['Budi Santoso', 'budi@gmail.com'],
            ['Dewi Lestari', 'dewi@gmail.com'],
            ['Rizky Pratama', 'rizky@gmail.com'],
            ['Nabila Putri', 'nabila@gmail.com'],
            ['Fajar Ramadhan', 'fajar@gmail.com'],
            ['Putri Maharani', 'putri@gmail.com'],
            ['Andi Saputra', 'andi@gmail.com'],
            ['Lina Marlina', 'lina@gmail.com'],
            ['Yoga Prasetyo', 'yoga@gmail.com'],
            ['Intan Permata', 'intan@gmail.com'],
            ['Rafi Maulana', 'rafi@gmail.com'],
            ['Customer Demo', 'user@gmail.com'],
        ];

        foreach ($users as $index => $user) {

            User::updateOrCreate(
                ['email' => $user[1]],
                [
                    'name' => $user[0],
                    'password' => Hash::make('password123'),
                    'role' => 'user',
                    'created_at' => now()->subDays(rand(1, 300)),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
