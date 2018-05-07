<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galang extends Model
{
	protected $table = 'tb_galang';
	protected $fillable = [
		'user_id',
		'judul',
		'kategori',
		'foto',
		'deskripsi',
		'lokasi',
		'target',
		'tgl_akhir',
	];
	protected $hidden = ['remember_token'];
    
    public function galangs() {
    	return $this->belongsTo(User::class);//punya foreign dari user
    }

    public function galangs2() {
    	return $this->hasMany(Donasi::class);//punya primary
    } 
}