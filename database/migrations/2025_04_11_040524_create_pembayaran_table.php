<?php

use App\Models\Pesanan;
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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pesanan::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->date('tgl_pembayaran');
            $table->string('bukti_pembayaran');
            $table->enum('bayar_dp', ['Sudah dibayar', 'Belum dibayar'])->default('Belum dibayar');
            $table->enum('bayar_lunas', ['Sudah dibayar', 'Belum dibayar'])->default('Belum dibayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
