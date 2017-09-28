<?php

namespace App\Models;

class GroupModel extends \Illuminate\Database\Eloquent\Model{
	//Definit le nom de la table et de la clé primaire 
	protected $table = 'groupe';
	protected $primaryKey = 'id_groupe';
	public $timestamps=false;

	
}