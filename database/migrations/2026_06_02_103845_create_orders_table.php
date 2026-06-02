<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('judul');

            $table->text('deskripsi');

            $table->date('deadline');

            $table->decimal('harga', 12, 2)
                ->nullable();

            $table->enum('status', [
                'pending',
                'konsultasi',
                'menunggu_pembayaran',
                'diproses',
                'revisi',
                'selesai',
                'dibatalkan'
            ])->default('pending');

            $table->string('file_tugas')
                ->nullable();

            $table->string('hasil_tugas')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
