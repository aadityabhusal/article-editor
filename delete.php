<?php 

include 'ArticleEditor.php';

if(!isset($_GET['id']) || empty($_GET['id'])){
	header('Location:index.php');
	return;
}

$delete = new ArticleEditor();

$result = $delete->getPost($_GET['id']);

if($result->rowCount() != 1){
	header('Location:index.php');
	return;
}

$delete->deletePost($_GET['id']);
header('Location:index.php');

 ?>