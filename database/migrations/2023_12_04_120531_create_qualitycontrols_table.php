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
        Schema::create('qualitycontrols', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('srs_id'); 
            $table->string('versi');
            $table->string('dibuat');
            $table->string('tglrevisi');
            $table->string('disetujui');
            $table->string('tglpersetujuan');
            $table->string('keterangan');
            $table->string('namaapp');
            $table->string('versiapp');
            $table->string('releaseapp');
            $table->string('tglpengujian');
            $table->string('jumlahcase');
            $table->string('caseberhasil');
            $table->string('caseeror');
            // $table->string('nomor');
            // $table->string('aspekinfrastruktur');
            // $table->string('hasiltes');
            // $table->string('catatann');
            $table->string('namatimevaluasi');
            $table->string('namaqc');
            $table->string('ttdtimevaluasi')->nullable();
            $table->string('ttdtimqc')->nullable();
            $table->string('namapc');
            $table->string('namaqcc');
            $table->timestamps();

            $table->foreign('srs_id')->references('id')->on('formsrs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualitycontrols');
    }
};
