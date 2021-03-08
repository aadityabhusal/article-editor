<?php 
include 'ArticleEditor.php';
include 'svgs.php';

if (isset($_POST['title']) && isset($_POST['hiddenTextArea'])){
	
	$posttitle = $_POST['title'];
	$postdescription = $_POST['hiddenTextArea'];

	if(!empty($posttitle) && !empty($postdescription)){

		$authorId = 254;
		$postId = $authorId + time() + rand(0,1000);
		$currentDateTime = date('Y-m-d H:i:s');

		$tempName = $_FILES['image']['tmp_name'];
		$exp = explode('.', $_FILES['image']['name']);
		$extension = strtolower(end($exp));
		$size = $_FILES['image']['size'];
		$location = 'images/';
		$imageName = $postId.'.'.$extension;
		if($extension == 'png' || $extension == 'jpg'){
			if($size < 2097152){
				move_uploaded_file($tempName,$location.$imageName);
			}
		}

		$values = array(
			'post_id' => $postId,
			'author_id' => $authorId,
			'title' => $_POST['title'],
			'image' => $imageName,
			'date' => $currentDateTime,
			'category' => 'Home',
			'tags' => 'all,web,hello'
		);

		$replaceBr = str_replace('<br>', '',trim($postdescription));
		$replaceDiv = str_replace('<div>', '',$replaceBr);
		$finalReplace =  str_replace('</div>', '',$replaceDiv);
		$handle = fopen('posts/'.$postId.'.php','w');
		fwrite($handle,$finalReplace);
		fclose($handle);

		$savePost = new ArticleEditor();

		if($savePost->savePost($values)){
			header('Location:index.php');
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
		<form action="editor.php" id="article-form" method="POST" enctype="multipart/form-data">
			<div id="title-box">
				<input type="text" id="title" name="title" placeholder="Enter the title of the article here." autocomplete="off">
			</div>
			<div id="title-image">
				<label id="image-label" for="image">Choose an image for the article <?php echo $imageWide ?></label>
				<input type="file" name="image" id="image">
				<img src="" class="displayImage">
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
				<div id="description" name="description" placeholder="Rules for using the Editor:" contenteditable="true"></div>
				<input id="post" type="button" value="Post The Article" onClick="submitForm()">
				<a href="index.php">Cancel</a>
			</div>
	</div>
	<script type="text/javascript">
		function submitForm(){
			if(document.getElementById('title').value.trim() == '' || document.getElementById('image').value == '' || document.getElementById('description').innerHTML.trim() == ''){
				alert('Please Fill All The Fields');
			}else{
				// var articleForm = document.getElementById('article-form');
				document.getElementById('hiddenTextArea').value = document.getElementById('description').innerHTML;
				document.getElementById('article-form').submit();
			}
		}

	</script>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>