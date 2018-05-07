<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table ='tb_users';
    
    protected $fillable = [
        'nama', 
        'jenkel', 
        'no_telp',
        'email', 
        'alamat',
        'username',
        'password',
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

   	public function users() {
    	return $this->hasMany(Galang::class);//punya primary
    } 
}
