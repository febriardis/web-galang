<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbGalang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_galang', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger ('user_id'); //foreign key
            $table->string('judul');
            $table->string('kategori');
            $table->string('foto');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->string('target');
            $table->date('tgl_akhir');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('tb_galang', function(Blueprint $kolom){ //schema initial foreign key
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
        Schema::dropIfExists('tb_galang');
    }
}
