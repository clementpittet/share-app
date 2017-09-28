<?php 
namespace App\Controller;
use PasswordLib;

Class RestGroupController{
  
	public function getAllGroups($app){
		$app->response->setStatus(200);
		$app->response->headers->set('Content-type','application/json');//Définit le type de données renvoyé (ici JSON) 
		\App\database\Base::EloConfig();
		
		$groups = \App\Models\GroupModel::all();
		$data = ["groupe"=>$groups->toArray()];
		$dataJSon = json_encode($data);
		return $dataJSon;
	}

	public function getGroup($app, $id){
		$app->response->setStatus(200);
		$app->response->headers->set('Content-type','application/json');//Définit le type de données renvoyé (ici JSON) 
		\App\database\Base::EloConfig();
		
		$groupe = \App\Models\GroupModel::find($id);
		if($groupe != null){
			$data = ["groupe"=>$groupe->toArray()];
			$dataJSon = json_encode($data);
			return $dataJSon;				
		}else{
			return json_encode(json_decode ("{}"));
		}
	}

	public function createGroup($app, $post){
		$app->response->setStatus(200) ;
		$utils  = new \App\Controller\UtilsController();
		$group = new \App\Models\GroupModel();
    $purifier = $utils->configHtmlPurifier();

		\App\database\Base::EloConfig();
		$group->name_groupe = !empty($post['name'] != null) ? $purifier->purify($post['name']) : '';
		$group->save();

		$infoUser =  \App\Models\GroupModel::orderBy('id_groupe','DESC')->first();
		$data = ["groupe"=>$infoUser->toArray()];
		$dataJSon = json_encode($data);
		
		echo $dataJSon;
	}

}