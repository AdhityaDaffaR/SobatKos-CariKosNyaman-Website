<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kost_id')->constrained('kosts')->onDelete('cascade');
            $table->string('nama_penyewa');
            $table->string('no_hp');
            $table->date('tanggal_mulai');
            $table->integer('durasi'); // Dalam bulan
            $table->decimal('total_harga', 15, 2);
            $table->enum('status', ['Pending', 'Lunas'])->default('Pending');
            $table->string('bukti_bayar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};