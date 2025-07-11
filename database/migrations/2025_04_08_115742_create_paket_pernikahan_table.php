<?php

use App\Models\User;
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
        $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
        $table->string('upload_file')->nullable();
        $table->string('nama_paket');

        // Foreign key ke tabel kerjasama + pilihan harga
        $table->foreignId('venue')->nullable()->constrained('kerjasama')->nullOnDelete();
        $table->enum('venue_ket_harga', ['harga01', 'harga02'])->nullable();

        $table->foreignId('dekorasi')->nullable()->constrained('kerjasama')->nullOnDelete();
        $table->enum('dekorasi_ket_harga', ['harga01', 'harga02'])->nullable();

        $table->foreignId('tata_rias')->nullable()->constrained('kerjasama')->nullOnDelete();
        $table->enum('tata_rias_ket_harga', ['harga01', 'harga02'])->nullable();

        $table->foreignId('catering')->nullable()->constrained('kerjasama')->nullOnDelete();
        $table->enum('catering_ket_harga', ['harga01', 'harga02'])->nullable();

        $table->foreignId('kue_pernikahan')->nullable()->constrained('kerjasama')->nullOnDelete();
        $table->enum('kue_pernikahan_ket_harga', ['harga01', 'harga02'])->nullable();

        $table->foreignId('fotografer')->nullable()->constrained('kerjasama')->nullOnDelete();
        $table->enum('fotografer_ket_harga', ['harga01', 'harga02'])->nullable();

        $table->foreignId('entertainment')->nullable()->constrained('kerjasama')->nullOnDelete();
        $table->enum('entertainment_ket_harga', ['harga01', 'harga02'])->nullable();

        // Field tambahan
        $table->integer('staff_acara')->nullable();
        $table->bigInteger('hargaDP_paket');
        $table->bigInteger('hargaLunas_paket');
        $table->enum('status_paket', ['Tersedia', 'Tidak tersedia', 'Eksklusif']);
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
