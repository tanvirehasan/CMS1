<?php session_start(); if (isset($_SESSION['logged_in'])){}else{header('location:../login.php');} ?>

<!DOCTYPE html>
<html>
<head>
	<title>update and delete</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

		<?php if (isset($_SESSION['mag'])):?>
			<div class="mag">
				<?php	echo $_SESSION['mag'];
				unset($_SESSION['mag']);

			 ?>
			</div>
		<?php endif ?>
<form method="post" action="upload.php" enctype="multipart/form-data" >
	<input type="hidden" name="id" value="<?php echo $id; ?>" >
	<div class="ied">
		<label>Post Title</label>
		<input type="text" name="artical_title">
	</div>
		<div class="ied">
		<label>Post</label>
		<textarea  cols="80"  rows="20"  type="text" name="artical_content" > </textarea>
		<input type="file" name="fileToUpload" id="fileToUpload">
	</div>
		<div class="ied">
			<button type="submit" name="save" class="butt">save</button>
	</div>
</form>


</body>
</html>