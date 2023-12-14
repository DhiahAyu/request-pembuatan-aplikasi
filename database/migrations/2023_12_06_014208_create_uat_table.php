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
        Schema::create('uat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formuat_id');
            $table->string('na')->nullable();
            $table->text('tahapan_scenario')->nullable();
            $table->text('test_result_pass')->nullable();
            $table->text('test_result_fail')->nullable();
            $table->text('tester')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();

            $table->foreign('formuat_id')->references('id')->on('formuat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uat');
    }
};
