<?php session_start(); if (isset($_SESSION['logged_in'])){}else{header('location:../login.php');} ?>
<?php
	$title="";
	$content="";
	$id = 0;
	$edit_state = false;

	$db = mysqli_connect('localhost', 'root', '', 'cms');

	//info update
	if (isset($_POST['update'])) {
		$title = mysql_real_escape_string($_POST['artical_title']);
		$content = mysql_real_escape_string($_POST['artical_content']);
		$id = mysql_real_escape_string($_POST['artical_id']);

		mysqli_query($db, "UPDATE articales SET artical_title= '$title',  artical_content= '$content'  WHERE artical_id= $id " );
		$_SESSION['mag'] = "Info Update ! Thank you";
		header('location:index.php');
	}

	//info delete
	if (isset($_GET['del'])) {
		$id = $_GET['del'];

		mysqli_query($db, "DELETE FROM articales WHERE artical_id= $id" );
		$_SESSION['mag'] = "Info Delete ! Thank you";
		header('location:index.php');

	}

	//into post
	$results = mysqli_query($db, "SELECT * FROM articales ");

 ?>