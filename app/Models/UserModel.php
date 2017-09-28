<?php

namespace App\Models;

class UserModel extends \Illuminate\Database\Eloquent\Model{
	//Definit le nom de la table et de la clé primaire 
	protected $table = 'user';
	protected $primaryKey = 'id_user';
	public $timestamps=false;

	
}