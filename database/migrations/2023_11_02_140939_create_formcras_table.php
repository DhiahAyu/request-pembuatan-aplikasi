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
            $table->string('cr_analyst')->nullable();
            $table->string('originator_name')->nullable();
            $table->string('data_owner')->nullable();
            $table->string('date')->nullable();
            $table->string('project_name')->nullable();
            $table->text('impact_areas')->nullable();
            $table->text('priority')->nullable();
            $table->string('justifcation_major')->nullable();
            $table->string('justifcation_minor')->nullable();
            $table->string('general_context')->nullable();
            $table->string('pontential_cost')->nullable();
            $table->string('alternative_solutions')->nullable();
            $table->string('support')->nullable();
            $table->string('infrastructure')->nullable();
            $table->string('additional')->nullable();
            $table->timestamps();
            $table->string('actioncra');
            $table->string('kirimke')->nullable();
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
