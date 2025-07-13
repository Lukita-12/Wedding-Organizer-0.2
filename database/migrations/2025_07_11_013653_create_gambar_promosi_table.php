<?php

use App\Models\Kerjasama;
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
        Schema::create('gambar_promosi', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kerjasama::class)
                  ->constrained()
                  ->onDelete('cascade'); // hapus gambar jika kerjasama dihapus
            $table->string('file_path'); // path ke file gambar
            $table->string('caption')->nullable(); // opsional: keterangan gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_promosi');
    }
};
