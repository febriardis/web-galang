<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    protected $table = 'tb_konfirmasi';
	protected $fillable = [
		'donasi_id',
		'nominal',
		'bukti',
	];
	protected $hidden = ['remember_token'];
    
    public function konfirm() {
    	return $this->belongsTo(Donasi::class);//punya foreign dari user
    }}
