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
            $table->foreignIdFor(User::class)   ->nullable()->constrained()->nullOnDelete();
            $table->string('upload_file')       ->nullable();
            $table->string('nama_paket');

            // Foreign key ke kerjasama, nullable karena boleh dikosongkan
            $table->foreignId('venue')          ->nullable()->constrained('kerjasama')->nullOnDelete();
            $table->foreignId('dekorasi')       ->nullable()->constrained('kerjasama')->nullOnDelete();
            $table->foreignId('tata_rias')      ->nullable()->constrained('kerjasama')->nullOnDelete();
            $table->foreignId('catering')       ->nullable()->constrained('kerjasama')->nullOnDelete();
            $table->foreignId('kue_pernikahan') ->nullable()->constrained('kerjasama')->nullOnDelete();
            $table->foreignId('fotografer')     ->nullable()->constrained('kerjasama')->nullOnDelete();
            $table->foreignId('entertainment')  ->nullable()->constrained('kerjasama')->nullOnDelete();

            // Keterangan vendor
            $table->string('ket_venue')         ->nullable();
            $table->string('ket_dekorasi')      ->nullable();
            $table->string('ket_tata_rias')     ->nullable();
            $table->string('ket_catering')      ->nullable();
            $table->string('ket_kue_pernikahan')->nullable();
            $table->string('ket_fotografer')    ->nullable();
            $table->string('ket_entertainment') ->nullable();

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
