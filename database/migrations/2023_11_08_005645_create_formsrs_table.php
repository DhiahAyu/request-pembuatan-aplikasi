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
    Schema::create('formsrs', function (Blueprint $table) {
        $table->id();
            $table->unsignedBigInteger('request_id'); // Relasi ke tabel rfcs
            $table->integer('tot_progress')->nullable();
            $table->timestamps();
            
            // Menambahkan foreign key ke rfc_id
            $table->foreign('request_id')->references('id')->on('formrequests')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formsrs');
    }
};
