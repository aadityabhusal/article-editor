<?php 
include 'ArticleEditor.php';
include 'svgs.php';

if(!isset($_GET['id']) || empty($_GET['id'])){
	header('Location:index.php');
	return;
}

$update = new ArticleEditor();

$result = $update->getPost($_GET['id']);

if($result->rowCount() != 1){
	header('Location:index.php');
	return;
}

$data = $result->fetch();;


if (isset($_POST['title']) && isset($_POST['hiddenTextArea'])){
	
	$posttitle = $_POST['title'];
	$postdescription = $_POST['hiddenTextArea'];

	if(!empty($posttitle) && !empty($postdescription)){

		$currentDateTime = date('Y-m-d H:i:s');

		if($_FILES['image']['name'] == '' || $_FILES['image']['size'] == 0){
			$imageName = $data['image'];
		}else{
			$tempName = $_FILES['image']['tmp_name'];
			$exp = explode('.', $_FILES['image']['name']);
			$extension = strtolower(end($exp));
			$size = $_FILES['image']['size'];
			$location = 'images/';
			$imageName = $data['post_id'].'.'.$extension;
			if($extension == 'png' || $extension == 'jpg'){
				if($size < 2097152){
					move_uploaded_file($tempName,$location.$imageName);
				}
			}
		}
		

		$values = array(
			'post_id' => $data['post_id'],
			'author_id' => $data['author_id'],
			'title' => $_POST['title'],
			'image' => $imageName,
			'updated' => $currentDateTime,
			'category' => 'Home',
			'tags' => 'all,web,hello'
		);

		$replaceBr = str_replace('<br>', '',trim($postdescription));
		$replaceDiv = str_replace('<div>', '',$replaceBr);
		$finalReplace =  str_replace('</div>', '',$replaceDiv);
		$handle = fopen('posts/'.$data['post_id'].'.php','w');
		fwrite($handle,$finalReplace);
		fclose($handle);
		
		if($update->updatePost($values,'post_id',$data['post_id'])){
			header('Location:index.php?id='.$data['post_id']);
		}
	}else{
		echo "<script>alert('Empty Fields')</script>";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Aritcle Editor</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="editor.css">
</head>
<body>
	<div id="container">
		<form action="update.php?id=<?php echo $data['post_id'] ?>" id="article-form" method="POST" enctype="multipart/form-data">
			<div id="title-box">
				<input type="text" id="title" name="title" value="<?php echo $data['title'] ?>" placeholder="Enter the title of the article here." autocomplete="off">
			</div>
			<div id="title-image">
				<label id="image-label" for="image">Choose an image for the article <?php echo $imageWide ?></label>
				<input type="file" name="image" id="image">
				<img src="images/<?php echo $data['image'] ?>" class="displayImage">
			</div>
			<div id="description-area">
				<div id="tool-bar">
					<button type="button" title="Undo" onClick="func('undo')"><?php echo $undo ?></button>
					<button type="button" title="Redo" onClick="func('redo')"><?php echo $redo ?></button>
					<button type="button" title="Paragraph" onClick="setTag('p')">P</button>
					<button type="button" title="Link" onClick="link()"><?php echo $link ?></button>
					<button type="button" title="Unlink" onClick="func('Unlink')"><?php echo $linkOff ?></button>
					<button type="button" title="Image" onClick="setImage()"><?php echo $imageWide ?></button>
					<button type="button" title="Blockquote" onClick="setTag('blockquote')"><?php echo $codeTags ?></button>
					<button type="button" title="Ordered List" onClick="func('InsertOrderedList')"><?php echo $orderedList ?></button>
					<button type="button" title="Inordered List" onClick="func('InsertUnorderedList')"><?php echo $unorderedList ?></button>
					<button type="button" title="Heading 2" onClick="setTag('h2')">H2</button>
					<button type="button" title="Heading 3" onClick="setTag('h3')">H3</button>
					<button type="button" title="Horizontal Rule" onClick="func('inserthorizontalrule')"><?php echo $hr ?></button>
					<button type="button" title="Bold" onClick="func('bold')"><?php echo $bold ?></button>
					<button type="button" title="Underline" onClick="func('underline')"><?php echo $underline ?></button>
					<button type="button" title="Italic" onClick="func('italic')"><?php echo $italics ?></button>
					<button type="button" title="Strike" onClick="func('strikeThrough')"><?php echo $strike ?></button>
					<button type="button" title="Subscript" onClick="func('subscript')"><?php echo $subscript ?></button>
					<button type="button" title="Superscript" onClick="func('superscript')"><?php echo $superscript ?></button>
				</div>
				<textarea style="display:none;" name="hiddenTextArea" id="hiddenTextArea" cols="100" rows="14"></textarea>
				<div id="description" name="description" placeholder="Enter the Description of the Post" contenteditable="true">
					<?php include 'posts/'.$data['post_id'].'.php'; ?>
				</div>
				<input id="post" type="button" value="Update Post" onClick="submitForm()">
				<a href="index.php">Cancel</a>
			</div>
	</div>
	<script type="text/javascript">
		function submitForm(){
			if(document.getElementById('title').value.trim() == '' || document.getElementById('description').innerHTML.trim() == ''){
				alert('Please Fill All The Fields');
			}else{
				var articleForm = document.getElementById('article-form');
				document.getElementById('hiddenTextArea').value = document.getElementById('description').innerHTML;
				articleForm.submit();
			}
		}

	</script>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>