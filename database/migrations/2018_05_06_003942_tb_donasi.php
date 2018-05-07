<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbDonasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tb_donasi', function (Blueprint $table) {
            $table->increments('id');           
            $table->unsignedInteger ('galang_id'); //foreign key
            $table->unsignedInteger ('user_id'); //foreign key
            $table->string('nominal');
            $table->text('komentar');
            $table->string('bank');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('tb_donasi', function(Blueprint $kolom){ //schema initial foreign key
            $kolom->foreign('galang_id')->references('id')->on('tb_galang')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('user_id')->references('id')->on('tb_users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_donasi');
    }
}
