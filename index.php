<?php 
//Autoload 
require 'vendor/autoload.php';
session_start();
$app = new \Slim\Slim();

//---------URL API REST--------//

$restCtrlUsers  = new \App\Controller\RestUsersController();
$restCtrlGroup  = new \App\Controller\RestGroupController();

//GET HOME
$app->get('/', function() use($restCtrlUsers, $app){
	echo 'Home';
});

/*MANAGED USERS*/
//GET ALL USERS
$app->get('/users', function() use($restCtrlUsers, $app){
	$get = $app->request->get();
	$users = $restCtrlUsers->getAllUsers($app);
	echo $users;
});
//GET USERS BY ID
$app->get('/users/:id', function($id) use($restCtrlUsers, $app){
	$get = $app->request->get();
	$user = $restCtrlUsers->getUser($app, $id);
	echo $user;
});
//Create USERS
$app->post('/users/add/', function() use($restCtrlUsers, $app){
	$post = $app->request->post();
	$userInfo= $restCtrlUsers->CreateUser($app, $post);
});

/*MANAGED GROUPS*/
//GET ALL GROUPS
$app->get('/groups', function() use($restCtrlGroup, $app){
	$get = $app->request->get();
	$groups = $restCtrlGroup->getAllGroups($app);
	echo $groups;
});
//GET GROUPE BY ID
$app->get('/groups/:id', function($id) use($restCtrlGroup, $app){
	$get = $app->request->get();
	$group = $restCtrlGroup->getGroup($app, $id);
	echo $group;
});
//Create GROUP
$app->post('/groups/add/', function() use($restCtrlGroup, $app){
	$post = $app->request->post();
	$groupInfo= $restCtrlGroup->CreateGroup($app, $post);
});
	
$app->run();
