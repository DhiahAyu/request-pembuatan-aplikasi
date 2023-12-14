<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('formuat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id'); // Relasi ke tabel rfcs
            $table->string('versi')->nullable();
            $table->string('dibuat_oleh')->nullable();
            $table->string('disetujui_oleh')->nullable();
            $table->string('tanggal_persetujuan')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('jumlahtc')->nullable();
            $table->string('jumlahtcberhasil')->nullable();
            $table->string('jumlahtcerror')->nullable();
            $table->string('namapjp')->nullable();
            $table->string('jabatanpjp')->nullable();
            $table->string('ttdpjp')->nullable();
            $table->string('namakte')->nullable();
            $table->string('jabatankte')->nullable();
            $table->string('ttdkte')->nullable();
            $table->string('namasp')->nullable();
            $table->string('jabatansp')->nullable();
            $table->string('ttdsp')->nullable();
            $table->string('namaba')->nullable();
            $table->string('jabatanba')->nullable();
            $table->string('ttdba')->nullable();
            $table->string('namapc')->nullable();
            $table->string('jabatanpc')->nullable();
            $table->string('namaprogrammer')->nullable();
            $table->string('jabatanprogrammer')->nullable();
            $table->string('namatester')->nullable();
            $table->string('jabatantester')->nullable();
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
        Schema::dropIfExists('formuat');
    }
};
