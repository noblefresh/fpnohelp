<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotbrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('botbrains', function (Blueprint $table) {
            $table->id();
            $table->longText('question');
            $table->longText('answer');
            $table->string('extra')->nullable();
            $table->string('extra1')->nullable();
            $table->string('extra2')->nullable();
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
        Schema::dropIfExists('botbrains');
    }
}
