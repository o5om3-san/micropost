<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFavTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_fav', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('fav_id')->unsigned()->index();
            $table->timestamps();
            
            //foreign key setting
            $table->foreign('user_id')->refrences('id')->on('users')->onDelete('cascade');
            $table->foreign('fav_id')->refrences('id')->on('microposts')->onDelete('cascade');
            
            $table->unique(['user_id', 'fav_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_fav');
    }
}
