<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('botmessages', function (Blueprint $table) {
            $table->id();
            $table->longText('message');
            $table->string('receiver_id');
            $table->string('user_id');
            $table->string('chat_id');
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
        Schema::dropIfExists('botmessages');
    }
}
