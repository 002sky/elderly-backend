<?php


use GuzzleHttp\Promise\Create;
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
        Schema::create('elderly_profiles', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->date('DOB');
            $table->string('gender');
            $table->string('roomID');
            $table->string('bedNo');
            $table->longText('descrition');
            $table->binary('elderlyImage')->nullable();
            $table->foreignId('erID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elderlyProfile');
    }
};
