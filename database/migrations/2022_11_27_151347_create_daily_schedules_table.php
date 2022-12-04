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
        Schema::create('daily_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('taskName');
            $table->time('time');
            $table->dateTime('date', $precision = 0);
            $table->boolean('status');
            $table->foreignId('MedicationTimeID')->references('id')->on('medication_notifications');
            $table->json('details');
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
        Schema::dropIfExists('daily_schedules');
    }
};
