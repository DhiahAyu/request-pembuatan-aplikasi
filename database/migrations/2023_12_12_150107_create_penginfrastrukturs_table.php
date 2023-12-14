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
        Schema::create('penginfrastrukturs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qc_id'); 
            $table->string('nomor');
            $table->string('aspekinfrastruktur');
            $table->string('hasiltes');
            $table->string('catatann');
            $table->timestamps();

            // $table->foreign('qc_id')->references('id')->on('pengujians')->onDelete('cascade');

            $table->foreign('qc_id')->references('id')->on('qualitycontrols')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penginfrastrukturs');
    }
};
