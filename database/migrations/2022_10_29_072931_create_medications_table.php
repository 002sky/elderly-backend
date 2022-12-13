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
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->string('medicationName');
            $table->string('type');
            $table->string('description');
            $table->dateTime('expireDate', $precision = 0);
            $table->string('dose');
            $table->binary('image')->nullable();
            $table->integer('quantity');
            $table->foreignId('elderlyID')->references('id')->on('elderly_profiles')->onDelete('cascade');
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
        Schema::dropIfExists('medications');
    }
};
