<?php

$app->get('/home', 'App\Controllers\web\HomeController:index')->setName('home');
$app->get('/login', 'App\Controllers\web\UserController:getLogin')->setName('user.login');
$app->post('/login', 'App\Controllers\web\UserController:login');

$app->group('/article/', function() use ($app, $container) { 
	$app->get('add', 'App\Controllers\web\ArticleController:getAdd')
		->setName('article-add');
	$app->post('add', 'App\Controllers\web\ArticleController:add');
	$app->get('edit/{id}', 'App\Controllers\web\ArticleController:getUpdate')
		->setName('article-edit');
	$app->post('edit/{id}', 'App\Controllers\web\ArticleController:update');
	$app->get('list/active', 'App\Controllers\web\ArticleController:getActiveArticle')
		->setName('article-list-active');
	$app->post('list/active', 'App\Controllers\web\ArticleController:setInactive');
	$app->get('list/in-active', 'App\Controllers\web\ArticleController:getInactiveArticle')
		->setName('article-list-inactive');
	$app->get('list/in-active/{id}', 'App\Controllers\web\ArticleController:setActive')
		->setName('article-restore');
	$app->get('read/{id}', 'App\Controllers\web\ArticleController:readArticle')
		->setName('article-read');
	$app->post('delete', 'App\Controllers\web\ArticleController:setDelete')
		->setName('article-del');
});