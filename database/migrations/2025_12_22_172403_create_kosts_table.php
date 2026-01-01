<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kost');
            $table->enum('tipe', ['Putra', 'Putri', 'Campur']); // Tipe kos
            $table->decimal('harga', 15, 2); // Harga (biar presisi pakai decimal)
            $table->string('lokasi'); 
            $table->text('alamat_lengkap');
            $table->text('fasilitas'); 
            $table->text('deskripsi');
            $table->string('gambar_url');
            $table->string('nama_pemilik');
            $table->string('no_hp_pemilik');
            
            // --- TAMBAHAN PENTING (Agar fitur rating jalan) ---
            $table->double('rating')->default(4.5); 
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kosts');
    }
};