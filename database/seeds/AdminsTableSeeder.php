<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::insert([
        	'nama' 			=> 'Subhan',
        	'username'		=> 'subhanadmin',
        	'password'		=> bcrypt('subhan1234'),
            'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
            'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')
        ]);    }
}
