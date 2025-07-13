<?php

use App\Models\PaketPernikahan;
use App\Models\Pelanggan;
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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pelanggan::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(PaketPernikahan::class)->nullable()->constrained()->nullOnDelete();

            $table->date('tgl_pesanan');
            $table->date('tanggal_acara');
            $table->date('tanggal_diskusi');
            $table->decimal('harga_dp', 15, 2)->nullable();
            $table->decimal('harga_lunas', 15, 2)->nullable();
            $table->decimal('total_harga_pesanan', 15, 2)->nullable();
            $table->string('status_pesanan')->default('Dalam proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
