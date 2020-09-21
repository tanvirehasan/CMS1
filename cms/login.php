<?php 
	include 'inc/conn.php';
	session_start();

	if(isset($_SESSION['logged_in'])){		
		header('location:index.php');
	}

		if (isset($_POST['user_email'],$_POST['user_pass'])){
			$username = $_POST['user_email'];
			$password = md5($_POST['user_pass']);
			if (empty($username) or empty($password)) {
				$error = 'All fileds are required !';
			}else{
				$query = $pdo->prepare("SELECT * FROM users WHERE user_email=? AND user_pass=? ");
				$query->bindValue(1,$username);
				$query->bindValue(2,$password);
				$query->execute();
				$num = $query->rowcount();
				if($num==1){
					$_SESSION['logged_in'] = true;
					header ('location:index.php');
					exit;

				}else{
					$error= 'worng pass';
				}
			}
		}
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>BANGLADESH || Login here</title>
	<link rel="icon" href="img/bd.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
<form action="login.php" method="POST" >
	<div class="loginBox">
		
		<h2>Log In !</h2>
		<?php if (isset($error)){
					echo "<small style='color:red;'>$error<small><br/><br/>";
				} ?>
		<p>Email</p>
		<input type="email" name="user_email" autocomplete="off" placeholder="Enter Email">
		<p>Password</p>
		<input type="Password" name="user_pass"  autocomplete="off" placeholder="........">
		<input type="submit" name="" value="sign In">
		<a href="#">Forger Password</a>
		<a href="sinup.php" style="float: right;">sign up</a>
	</div>

</form>
</body>
</html>