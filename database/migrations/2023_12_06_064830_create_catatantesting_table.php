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
        Schema::create('catatantesting', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formuat_id')->nullable();
            $table->string('catatan')->nullable();
            $table->string('user')->nullable();
            $table->timestamps();
            
            $table->foreign('formuat_id')->references('id')->on('formuat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatantesting');
    }
};
