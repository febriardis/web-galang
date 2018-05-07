<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
	protected $table = 'tb_donasi';
	protected $fillable = [
		'galang_id',
		'user_id',
		'nominal',
		'komentar',
		'bank',
		'status',
	];
	protected $hidden = ['remember_token'];
    
    public function donas1() {
    	return $this->belongsTo(User::class);//punya foreign dari user
    }
	public function donas2() {
    	return $this->belongsTo(Galang::class);//punya foreign dari user
    }
    public function konfdonasi() {
    	return $this->hasMany(Konfirmasi::class);//punya primary
    } 
}
