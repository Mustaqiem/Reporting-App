<?php




$app->get('/home', 'App\Controllers\web\HomeController:index')->setName('home');

$app->get('/item', 'App\Controllers\web\ItemController:index')->setName('index');

$app->get('/item/add', 'App\Controllers\web\ItemController:getAdd')->setName('item.add');

$app->post('/item/add', 'App\Controllers\web\ItemController:postAdd')->setName('item.add.post');

$app->get('/item/update/{id}', 'App\Controllers\web\ItemController:getUpdateItem')->setName('item.update');

$app->post('/item/update/{id}', 'App\Controllers\web\ItemController:postUpdateItem')->setName('item.update.post');

$app->get('/item/del/{id}', 'App\Controllers\web\ItemController:hardDeleteItem')->setName('item.delete');

$app->get('/item/softdel/{id}', 'App\Controllers\web\ItemController:softDeleteItem')->setName('item.soft.delete');

$app->get('/item/restore/{id}', 'App\Controllers\web\ItemController:restoreItem')->setName('item.restore');

$app->get('/item/trash', 'App\Controllers\web\ItemController:getTrash')->setName('item.trash');
