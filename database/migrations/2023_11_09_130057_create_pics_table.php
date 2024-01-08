<?php

// database/migrations/xxxx_xx_xx_create_pics_table.php
// database/migrations/xxxx_xx_xx_create_pics_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicsTable extends Migration
{
    public function up()
    {
        Schema::create('pics', function (Blueprint $table) {
            $table->id();
            $table->string('name_pic');
            $table->unsignedBigInteger('srs_id'); // Tambahkan unsigned pada tipe data
            $table->foreign('srs_id')->references('id')->on('formsrs')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('pics');
    }
}
