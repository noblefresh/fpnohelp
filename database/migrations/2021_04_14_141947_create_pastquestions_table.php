<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastquestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastquestions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deptid');
            $table->foreign('deptid')->references('id')->on('departments');
            $table->string('faculty_id');
            $table->string('level');
            $table->string('semester');
            $table->string('year');
            $table->string('coursecode');
            $table->string('program');
            $table->string('page');
            $table->string('action')->default('locked');
            $table->string('image');
            $table->string('userid');
            $table->string('extra1')->nullable();
            $table->string('extra2')->nullable();
            $table->string('extra3')->nullable();
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
        Schema::dropIfExists('pastquestions');
    }
}
