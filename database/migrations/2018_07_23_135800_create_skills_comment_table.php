<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skill_id')->unsigned()->index()->onDelete('cascade');
            $table->integer('comment_id')->unsigned()->index()->onDelete('cascade');
            $table->timestamps();
            
            $table->foreign('skill_id')->references('id')->on('skills');
            $table->foreign('comment_id')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_comment');
    }
}
