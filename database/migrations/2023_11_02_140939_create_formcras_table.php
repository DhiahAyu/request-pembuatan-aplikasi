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
        Schema::create('formcras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id'); // Relasi ke tabel rfcs
            $table->string('cr_analyst')->nullable();
            $table->string('originator_name')->nullable();
            $table->string('data_owner')->nullable();
            $table->string('date')->nullable();
            $table->string('project_name')->nullable();
            $table->text('impact_areas')->nullable();
            $table->text('priority')->nullable();
            $table->string('general_context')->nullable();
            $table->string('pontential_cost')->nullable();
            $table->string('alternative_solutions')->nullable();
            $table->string('support')->nullable();
            $table->string('infrastructure')->nullable();
            $table->string('additional')->nullable();
            $table->timestamps();
            $table->string('actioncra');
            $table->string('kirimke')->nullable();
            $table->string('akses_user')->nullable();
            $table->string('topologi_server')->nullable();
            $table->string('spesifikasi_server')->nullable();
            $table->string('software')->nullable();
            $table->string('tipe_data')->nullable();
            $table->string('komponen_backup')->nullable();
            $table->string('frekuensi_backup')->nullable();
            $table->string('lama_backup')->nullable();
            $table->string('security')->nullable();
            $table->foreign('request_id')->references('id')->on('formrequests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formcras');
    }
};
