<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbDonasiView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE VIEW donasi_view AS SELECT
            tb_donasi.id as donasi_id,
            tb_donasi.user_id as user_id,
            tb_galang.judul as judul,
            tb_donasi.nominal as nominal,
            tb_donasi.bank as no_rek,
            tb_galang.tgl_akhir as tgl_akhir,
            tb_donasi.status as status
            FROM tb_donasi
            JOIN tb_galang
            ON (tb_donasi.galang_id = tb_galang.id);
        ');    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW donasi_view");    
    }
}
