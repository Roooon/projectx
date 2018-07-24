<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntrosCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intros_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('intro_id')->unsigned()->index()->onDelete('cascade');
            $table->integer('comment_id')->unsigned()->index()->onDelete('cascade');
            $table->timestamps();
            
            $table->foreign('comment_id')->references('id')->on('comments');
            $table->foreign('intro_id')->references('id')->on('intros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intro_comment');
    }
}
