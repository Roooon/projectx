<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturePost extends Migration
{
    public function up()
        {
            Schema::table('intros',function (Blueprint$table)
            {
            $table->string('post_picture', 100)->nullable();
            });
        }
        
    /**
     *  Reverse the migrations.
     * 
     * @return void
     */
     public function down()
     {
         Schema::table('groups',function (Blueprint$table){
             $table->dropColumn('post_picture');
         });
     }
     
}