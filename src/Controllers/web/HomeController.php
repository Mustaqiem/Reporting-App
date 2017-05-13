<?php

namespace App\Controllers\web;

class HomeController extends BaseController
{
    public function index($request, $response)
    {
        // var_dump($_SESSION['login']['is_admin']);die();
        if ($_SESSION['login']['is_admin'] == 1) {
            $article = new \App\Models\ArticleModel($this->db);
            $group = new \App\Models\GroupModel($this->db);
            $item = new \App\Models\Item($this->db);
            $user = new \App\Models\Users\UserModel($this->db);

            $activeGroup = count($group->getAll());
            $activeUser = count($user->getAll());
            $activeArticle = count($article->getAll());
            $activeItem = count($item->getAll());
            $inActiveGroup = count($group->getAllTrash());
            $inActiveUser = count($user->getAllTrash());
            $inActiveArticle = count($article->getAllTrash());
            $inActiveItem = count($item->getAllTrash());

            $data = $this->view->render($response, 'index.twig', [
    			'counts'=> [
                    'group'         =>	$activeGroup,
                    'user'	        =>	$activeUser,
                    'article'	    =>	$activeArticle,
                    'item' 			=>	$activeItem,
                    'inact_group'	=>	$inActiveGroup,
                    'inact_user'	=>	$inActiveUser,
                    'inact_article' =>	$inActiveArticle,
                    'inact_item'	=>	$inActiveItem,
    			]
    		]);

        } elseif ($_SESSION['login']['is_admin'] == 0) {
            $article = new \App\Models\ArticleModel($this->db);

            $article = $article->getAll();

            $data = $this->view->render($response, 'index.twig', ['article' => $article]);

        }

        return $data;
    }
}
