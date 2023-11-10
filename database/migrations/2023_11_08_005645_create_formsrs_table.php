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
        $table->string('nama_modul')->nullable();
        $table->text('requirement')->nullable(); // Menggunakan tipe data text untuk requirement
        $table->timestamps();
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
