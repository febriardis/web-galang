<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'tb_bank';
	protected $fillable = [
		'nama_bank',
		'no_rek',
	];
	protected $hidden = ['remember_token'];

}