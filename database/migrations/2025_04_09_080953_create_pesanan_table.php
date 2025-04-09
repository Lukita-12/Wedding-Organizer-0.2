<?php

use App\Models\PaketPernikahan;
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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(PaketPernikahan::class)->nullable()->constrained('paket_pernikahan')->nullOnDelete();

            $table->date('tgl_pesanan');
            $table->string('pengantin_pria');
            $table->string('pengantin_wanita');
            $table->date('tanggal_acara');
            $table->date('tanggal_diskusi');
            $table->decimal('total_harga_pesanan', 15, 2);
            $table->string('status_pesanan')->default('Ditunda');
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
