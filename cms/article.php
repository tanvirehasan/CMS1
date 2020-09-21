<?php 

	session_start();	
	if (isset($_SESSION['logged_in'])){
	}else{header('location:login.php');	}

	include 'inc/conn.php';
	include 'inc/article.php';

	$article = new Article;

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$data = $article->fetch_data($id);
?>		

 <!DOCTYPE html>
<html>
<head>
	<title><?php echo $data['artical_title'];?></title>
	<link rel="stylesheet" type="text/css" href="css/ban.css">
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
	</head>
<body>
	<?php include 'inc/header.php'; ?>

	<div class="text" style="width:80%; margin: 0 auto; padding: 20px;">
		<h3><?php echo $data['artical_title'];?></h3>
		<p> <img style="width: 100%;" src="img/<?php echo $data['img']; ?>"> </p>
		<p><?php echo $data['artical_content']; ?></p>
		<a style="text-decoration: none; font-size: 16px; font-family: arial;" href="index.php" > &#8592; Back </a>
	</div>

	<?php }
	else{ header('location:index.php'); } ?>
	<?php include 'inc/footer.php'; ?>


</div>
</body>
</html>