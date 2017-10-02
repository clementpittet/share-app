<?php

namespace App\Models;

class GroupModel extends \Illuminate\Database\Eloquent\Model{
	//Definit le nom de la table et de la clé primaire 
	protected $table = 'events';
	protected $primaryKey = 'id_events';
	public $timestamps=false;

	
}