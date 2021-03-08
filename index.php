<?php 
include 'ArticleEditor.php';
$article = new ArticleEditor();

if(isset($_GET['id']) && !empty($_GET['id'])){
	$postId = $_GET['id'];
	$result = $article->getPost($postId);

	if($result->rowCount() != 1){
		header('Location:index.php');
		return;
	}
	
	$data = $result->fetch();
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php $title = isset($_GET['id']) ? $data['title'] : 'Home'; echo $title; ?></title>
	<link href="https://fonts.googleapis.com/css?family=ABeeZee" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="article-container">
		<div id="article">
			<?php if(isset($_GET['id']) && !empty($_GET['id'])){ ?>
			<div id="article-head">
				<h1><?php echo $data['title'] ?></h1>
				<div id="changes">
					<a href="update.php?id=<?php echo $data['post_id'] ?>">Edit</a>
					<a href="delete.php?id=<?php echo $data['post_id'] ?>">Delete</a>
				</div>
				<img id="main-image" src="images/<?php echo $data['image'] ?>">
			</div>
			<?php include "posts/".$data['post_id'].".php"; }else{  ?>
			<h1>Welcome to our Article Website</h1>
			<h3 class="right-title">List of articles</h3>
			<ul id="article-list">
				<?php 
					$allPosts = $article->articleList();
					$allPostsData = $allPosts->fetchAll();

					foreach ($allPostsData as $key => $value) {
						echo "<li><a href='index.php?id=".$value['post_id']."'>".$value['title']."</a></li>";
					}
			 	?>
			</ul>
			<a href="editor.php">Add a new Post</a>
			<?php } ?>
		</div>
		<?php if(isset($_GET['id']) && !empty($_GET['id'])){ ?>
		<div id="right-section">
			<h3 class="right-title">List of articles</h3>
			<ul id="article-list">
				<?php 
					$allPosts = $article->articleList();
					$allPostsData = $allPosts->fetchAll();

					foreach ($allPostsData as $key => $value) {
						echo "<li><a href='index.php?id=".$value['post_id']."'>".$value['title']."</a></li>";
					}
			 	?>
			</ul>
			<a href="editor.php">Add a new Post</a>
		</div>
		<?php } ?>
	</div>
</body>
</html>