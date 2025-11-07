<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('jadwal_gurus', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->string('jam');
            $table->string('kelas');
            $table->string('mata_pelajaran');
            $table->string('nip'); //relasi ke guru
            $table->timestamps();
            $table->foreign('nip')->references('nip')->on('gurus')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_gurus');
    }
};
