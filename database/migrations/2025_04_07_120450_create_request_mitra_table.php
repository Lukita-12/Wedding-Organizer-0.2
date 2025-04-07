<?php

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
        Schema::create('request_mitra', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pelanggan::class)->nullable()->constrained()->nullOnDelete();
            $table->string('nama_usaha');
            $table->string('jenis_usaha');
            $table->string('nama_pemilik');
            $table->enum('status_request', ['Ditunggu', 'Diterima', 'Ditolak'])->default('Ditunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_mitra');
    }
};
