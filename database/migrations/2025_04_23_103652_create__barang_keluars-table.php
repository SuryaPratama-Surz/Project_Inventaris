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
        Schema::create('Barang_Keluars', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->integer('jumlah');
            $table->date('tglkeluar');
            $table->string('ket')->nullable();
            $table->foreignId('id_barang')->constrained('Data_Pusats', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Barang_Keluars');
    }
};
