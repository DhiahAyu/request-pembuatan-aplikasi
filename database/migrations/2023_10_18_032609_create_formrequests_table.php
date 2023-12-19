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
        Schema::create('formrequests', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aplikasi')->nullable();
            $table->string('sponsor_proyek')->nullable();
            $table->string('latar_belakang')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('wanted_feature')->nullable();
            $table->string('current_condition')->nullable();
            $table->string('kendala')->nullable();
            $table->string('ruang_lingkup')->nullable();
            $table->enum('status',['Rejected','Approved', 'Pending', 'Not Yet Submitted' ])->default('Not Yet Submitted');
            $table->string('pesan')->nullable();
            $table->timestamps();
            $table->string('action')->nullable();
            $table->string('formsfill')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formrequests');
    }
};
