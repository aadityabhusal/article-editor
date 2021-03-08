<?php 
class ArticleEditor
{
	public $pdo;
	function __construct()
	{
		try{
			$this->pdo = new PDO('mysql:host=localhost;dbname=articleeditor;charset=utf8','root','');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $this->pdo;
		}catch(PDOException $e){
			echo 'Connection Failed: '.$e->getMessage();
		}
	}

	function savePost($formData){
		$keys = array_keys($formData);
	    $fields = implode(', ', $keys);
	    $fieldsBind = implode(', :', $keys);
		$sql = "INSERT INTO posts($fields) VALUES(:$fieldsBind)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($formData);
		return $stmt;
	}


	function getPost($postId){
		$sql = "SELECT * FROM posts WHERE post_id = :postId";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':postId',$postId);
		$stmt->execute();
		return $stmt;
	}

	function articleList(){
		$sql = "SELECT post_id, title FROM posts";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	function updatePost($formData, $pk, $pkVal){
		$keys = [];
		foreach ($formData as $key => $value) {
			$keys[] = $key.' = :'.$key;
		}
		$keysList = implode(', ', $keys);
		$sql = "UPDATE posts SET $keysList WHERE $pk = $pkVal";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($formData);
		return $stmt;
	}

	function deletePost($postId){
		$sql = "DELETE FROM posts WHERE post_id = :postId";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':postId',$postId);
		$stmt->execute();
		return $stmt;
	}
}


 ?>