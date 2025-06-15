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
        Schema::create('bimbingan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_siswa', 20);
            $table->unsignedBigInteger('id_perbaikan');
            $table->foreign('kode_siswa')->references('nisn')->on('siswa')->onDelete('cascade');
            $table->foreign('id_perbaikan')->references('id')->on('introspeksi')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbingan');
    }
};
