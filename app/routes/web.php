<?php

$app->get('/home', 'App\Controllers\web\HomeController:index')->setName('home');
$app->get('/login', 'App\Controllers\web\UserController:getLogin')->setName('user.login');
$app->post('/login', 'App\Controllers\web\UserController:login');
$app->get('/register', 'App\Controllers\web\UserController:getRegister')->setName('register');

$app->post('/register', 'App\Controllers\web\UserController:postRegister');

$app->get('/logout', 'App\Controllers\web\UserController:logout')->setName('logout');

$app->get('/admin', 'App\Controllers\web\UserController:getLoginAsAdmin')->setName('login.admin');

$app->post('/admin', 'App\Controllers\web\UserController:loginAsAdmin');

$app->get('/', 'App\Controllers\web\UserController:getLogin')->setName('login');
$app->post('/', 'App\Controllers\web\UserController:loginAsUser');

$app->get('/profile', 'App\Controllers\web\UserController:viewProfile')->setName('user.profile');

$app->get('/setting', 'App\Controllers\web\UserController:getSettingAccount')->setName('user.setting');

$app->group('/admin', function() use ($app, $container) {

    $app->group('/group', function(){
        $this->get('', 'App\Controllers\web\GroupController:index')->setName('group.list');
        $this->get('/inactive', 'App\Controllers\web\GroupController:inActive')->setName('group.inactive');
        $this->get('/detail/{id}', 'App\Controllers\web\GroupController:findGroup')->setName('group.detail');
        $this->get('/create', 'App\Controllers\web\GroupController:getAdd')->setName('create.group.get');
        $this->post('/create', 'App\Controllers\web\GroupController:add')->setName('create.group.post');
        $this->get('/edit/{id}', 'App\Controllers\web\GroupController:getUpdate')->setName('edit.group.get');
        $this->post('/edit/{id}', 'App\Controllers\web\GroupController:update')->setName('edit.group.post');
        $this->post('/active', 'App\Controllers\web\GroupController:setInactive')->setName('group.set.inactive');
        $this->post('/inactive', 'App\Controllers\web\GroupController:setActive')->setName('group.set.active');
        $this->get('/{id}/users', 'App\Controllers\web\GroupController:getMemberGroup')->setName('user.group.get');
        $this->post('/users', 'App\Controllers\web\GroupController:setUserGroup')->setName('user.group.set');
        $this->get('/{id}/allusers', 'App\Controllers\web\GroupController:getNotMember')->setName('all.users.get');
        $this->post('/allusers', 'App\Controllers\web\GroupController:setMemberGroup')->setName('member.group.set');
    });

    $app->group('/user', function(){
        $this->get('/list', 'App\Controllers\web\UserController:listUser')->setName('user.list.all');
        $this->get('/trash', 'App\Controllers\web\UserController:trashUser')->setName('user.trash');
        $this->get('/adduser', 'App\Controllers\web\UserController:getCreateUser')->setName('user.create');
        $this->post('/adduser', 'App\Controllers\web\UserController:postCreateUser')->setName('user.create.post');
        $this->get('/del/{id}', 'App\Controllers\web\UserController:softDelete')->setName('user.del');
        $this->get('/delete/{id}', 'App\Controllers\web\UserController:hardDelete')->setName('user.delt');
        $this->get('/restore/{id}', 'App\Controllers\web\UserController:restoreData')->setName('user.restore');
        $this->get('/edit/{id}', 'App\Controllers\web\UserController:getUpdateData')->setName('user.edit.data');
        $this->post('/edit/{id}', 'App\Controllers\web\UserController:postUpdateData')->setName('user.edit.data');
    });

    $app->group('/article/', function() {
        $this->get('add', 'App\Controllers\web\ArticleController:getAdd')
        ->setName('article-add');
        $this->post('add', 'App\Controllers\web\ArticleController:add');
        $this->get('edit/{id}', 'App\Controllers\web\ArticleController:getUpdate')
        ->setName('article-edit');
        $this->post('edit/{id}', 'App\Controllers\web\ArticleController:update');
        $this->get('list/active', 'App\Controllers\web\ArticleController:getActiveArticle')
        ->setName('article-list-active');
        $this->post('list/active', 'App\Controllers\web\ArticleController:setInactive');
        $this->get('list/in-active', 'App\Controllers\web\ArticleController:getInactiveArticle')
        ->setName('article-list-inactive');
        $this->get('list/in-active/{id}', 'App\Controllers\web\ArticleController:setActive')
        ->setName('article-restore');
        $this->get('read/{id}', 'App\Controllers\web\ArticleController:readArticle')
        ->setName('article-read');
        $this->post('delete', 'App\Controllers\web\ArticleController:setDelete')
        ->setName('article-del');
    });

    $app->group('/item', function(){
        $this->get('', 'App\Controllers\web\ItemController:index')->setName('index');
        $this->get('/add', 'App\Controllers\web\ItemController:getAdd')->setName('item.add');
        $this->post('/add', 'App\Controllers\web\ItemController:postAdd')->setName('item.add.post');
        $this->get('/update/{id}', 'App\Controllers\web\ItemController:getUpdateItem')->setName('item.update');
        $this->post('/update/{id}', 'App\Controllers\web\ItemController:postUpdateItem')->setName('item.update.post');
        $this->get('/del/{id}', 'App\Controllers\web\ItemController:hardDeleteItem')->setName('item.delete');
        $this->get('/softdel/{id}', 'App\Controllers\web\ItemController:softDeleteItem')->setName('item.soft.delete');
        $this->get('/restore/{id}', 'App\Controllers\web\ItemController:restoreItem')->setName('item.restore');
        $this->get('/trash', 'App\Controllers\web\ItemController:getTrash')->setName('item.trash');

    });

});
