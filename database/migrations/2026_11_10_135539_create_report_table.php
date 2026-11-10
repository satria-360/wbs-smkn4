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
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->string('tracking_code')->unique(); // Kode unik untuk cek status
        $table->string('jenis_pelanggaran');
        $table->text('indikasi_apa');
        $table->string('lokasi_kejadian');
        $table->dateTime('waktu_kejadian');
        $table->string('nama_terlapor');
        $table->string('nuptk_terlapor')->nullable();
        $table->text('kronologis');
        
        // Data Pelapor (Bisa null jika anonim)
        $table->string('nama_pelapor')->nullable();
        $table->string('nis')->nullable();
        $table->string('nuptk_pelapor')->nullable();
        $table->string('email')->nullable();
        $table->string('no_hp')->nullable();
        $table->boolean('is_anonymous')->default(false);
        
        $table->enum('status', ['Baru', 'Diverifikasi', 'Diproses', 'Selesai'])->default('Baru');
        $table->text('catatan_admin')->nullable();
        $table->timestamps();
    });
}
};
