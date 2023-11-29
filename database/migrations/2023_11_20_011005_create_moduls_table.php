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
        Schema::create('moduls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('srs_id'); // Relasi ke tabel srs
            $table->string('nama');
            $table->integer('tot_modul')->nullable();
            $table->timestamps();
            
            // Menambahkan foreign key ke srs_id
            $table->foreign('srs_id')->references('id')->on('formsrs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moduls');
    }
};
