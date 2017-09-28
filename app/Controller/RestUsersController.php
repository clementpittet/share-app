<?php 
namespace App\Controller;
use PasswordLib;

Class RestUsersController{

	public function getAllUsers($app){
		$app->response->setStatus(200);
		$app->response->headers->set('Content-type','application/json');//Définit le type de données renvoyé (ici JSON) 
		\App\database\Base::EloConfig();
		
		$users = \App\Models\UserModel::all();
		$data = ["user"=>$users->toArray()];
		$dataJSon = json_encode($data);
		return $dataJSon;
	}

	public function getUser($app, $id){
		$app->response->setStatus(200);
		$app->response->headers->set('Content-type','application/json');//Définit le type de données renvoyé (ici JSON) 
		\App\database\Base::EloConfig();
		
		$user = \App\Models\UserModel::find($id);
		if($user != null){
			$data = ["user"=>$user->toArray()];
			$dataJSon = json_encode($data);
			return $dataJSon;				
		}else{
			return json_encode(json_decode ("{}"));
		}
	}

	public function createUser($app, $post){
		$app->response->setStatus(200) ;
		$utils  = new \App\Controller\UtilsController();
		$groups  = new \App\Controller\RestGroupController();
		$user = new \App\Models\UserModel();
    $purifier = $utils->configHtmlPurifier();

		\App\database\Base::EloConfig();
		$user->name_user = !empty($post['name'] != null) ? $purifier->purify($post['name']) : '';
		$user->firstname_user = !empty($post['firstname']) ? $purifier->purify($post['firstname']) : '';
		$user->username_user = !empty($post['username']) ? $post['username'] : $purifier->purify($post['firstname']).'_'.$purifier->purify($post['name']);
		$hash = password_hash($purifier->purify($post['password']), PASSWORD_BCRYPT);
		$user->password_user = !empty($hash) ? $hash : '';			
		$user->id_groupe = !empty($post['id_groupe'] != null) ? $post['id_groupe'] : 1;			
		$user->save();

		$infoUser =  \App\Models\UserModel::orderBy('id_user','DESC')->first();
		$groupName = \App\Models\GroupModel::find($user->id_groupe)->name_groupe;
		$data = ["user"=>$infoUser->toArray()];
		$data['user']['name_groupe'] = $groupName;
		
		unset($data['user']['password_user']);
		unset($data['user']['id_groupe']);
		$dataJSon = json_encode($data);
		
		echo $dataJSon;
	}

}