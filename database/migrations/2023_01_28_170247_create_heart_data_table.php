<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heart_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->references('id')->on('patients')->onUpdate('CASCADE')->onDelete(null);
            $table->integer('heart_rate');
            $table->integer('heart_rate_variability');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heart_data');
    }
};
