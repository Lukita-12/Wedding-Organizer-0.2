<?php

use App\Models\RequestMitra;
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
        Schema::create('kerjasama', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(RequestMitra::class)->nullable()->constrained()->nullOnDelete();
            $table->string('upload_file')->nullable();
            $table->string('noTelp_usaha')->nullable();
            $table->string('email_usaha')->nullable();
            $table->string('alamat_usaha')->nullable();
            $table->decimal('harga01', 15, 2)->nullable();
            $table->text('ket_harga01')->nullable();
            $table->decimal('harga02', 15, 2)->nullable();
            $table->text('ket_harga02')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerjasama');
    }
};
