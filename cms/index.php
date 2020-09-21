<?php 
	include 'inc/conn.php';
	include 'inc/article.php'; 
	$article = new Article;
	$articles = $article->fetch_all();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="description" content="Free Web tutorials">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
	<meta name="author" content="John Doe">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>

	<header>
		<h2>Downlaod files</h2>
	</header>

	<div class="content">



	<?php foreach ($articles as $article) { ?>

	<div class="cantentall">
		<div class="contnetbox">
			<img src="img/<?php echo $article['img'];?>">
		</div>
		<div class="title">
			<h3><?php echo $article['titile'];?></h3>
			<b><i class="fas fa-briefcase"></i> <?php echo $article['org'];?></b><br>
			<b><i class="far fa-calendar-alt"></i> <?php echo $article['date'];?></b><br>
			<b><i class="fas fa-map-marker-alt"></i> <?php echo $article['localtion'];?> </b>
		</div>
	</div>
	<?php } ?>
		
	</div>
</body>
</html>