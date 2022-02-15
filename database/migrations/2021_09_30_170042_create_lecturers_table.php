<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deptid');
            $table->foreign('deptid')->references('id')->on('departments');
            $table->string('faculty_id');
            $table->string('name');
            $table->string('email');
            $table->integer('followers')->default(1);
            $table->string('education');
            $table->string('location');
            $table->string('skill');
            $table->string('image');
            $table->string('note')->nullable();
            $table->longText('description');
            $table->integer('like')->default(1);
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('lecturers');
    }
}
