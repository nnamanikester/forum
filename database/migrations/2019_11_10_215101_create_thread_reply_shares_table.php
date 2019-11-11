<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadReplySharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_reply_shares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('thread_reply_id')->unsigned();
            $table->text('ip_address');
            $table->string('count');
            $table->timestamps();


            $table->foreign('thread_reply_id')->references('id')->on('thread_replies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thread_reply_shares');
    }
}
