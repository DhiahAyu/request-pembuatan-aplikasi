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
        Schema::create('pengujians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qc_id'); 
            $table->text('test_result')->nullable();
            // $table->text('fail')->nullable();
            $table->text('catatan');
            $table->timestamps();

            // $table->foreign('qc_id')->references('id')->on('qualitycontrols')->onDelete('cascade');
            $table->foreign('qc_id')->references('id')->on('qualitycontrols')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengujians');
    }
};
