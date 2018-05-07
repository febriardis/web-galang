<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbKonfirmasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                //
        Schema::create('tb_konfirmasi', function (Blueprint $table) {
            $table->increments('id');           
            $table->unsignedInteger ('donasi_id'); //foreign key
            $table->string('nominal');
            $table->string('bukti');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('tb_konfirmasi', function(Blueprint $kolom){ //schema initial foreign key
            $kolom->foreign('donasi_id')->references('id')->on('tb_donasi')->onDelete('cascade')->onUpdate('cascade');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_konfirmasi');    
    }
}
