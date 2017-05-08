<?php

namespace App\Models;

class ArticleModel extends BaseModel
{
	protected $table = 'articles';
	protected $column = ['title', 'content', 'image', 'deleted'];

	function add(array $data, $images)
	{
		$data = [
			'title' 	=> 	$data['title'],
			'content'	=>	$data['content'],
			'image'		=>	$images,
		];
		$this->createData($data);

		return $this->db->lastInsertId();
	}
}

?>
