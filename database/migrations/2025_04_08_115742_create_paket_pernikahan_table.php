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
        Schema::create('paket_pernikahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            // Foreign key ke kerjasama, nullable karena boleh dikosongkan
            $table->foreignId('venue')->nullable()->constrained('kerjasama')->nullOnDelete();
            $table->foreignId('dekorasi')->nullable()->constrained('kerjasama')->nullOnDelete();
            $table->foreignId('tata_rias')->nullable()->constrained('kerjasama')->nullOnDelete();
            $table->foreignId('catering')->nullable()->constrained('kerjasama')->nullOnDelete();
            $table->foreignId('kue_pernikahan')->nullable()->constrained('kerjasama')->nullOnDelete();
            $table->foreignId('fotografer')->nullable()->constrained('kerjasama')->nullOnDelete();
            $table->foreignId('entertaiment')->nullable()->constrained('kerjasama')->nullOnDelete();

            $table->integer('staff_acara')->nullable();
            $table->bigInteger('hargaDP_paket');
            $table->bigInteger('hargaLunas_paket');
            $table->string('status_paket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_pernikahan');
    }
};
