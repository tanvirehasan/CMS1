<?php 

	session_start();	
	include 'inc/conn.php';
		if (isset($_SESSION['logged_in'])){
		header('location:index.php');
	}

		if (isset($_POST['user_name'], $_POST['user_email'],$_POST['user_pass'])) {
			$name = $_POST['user_name'];
			$email = $_POST['user_email'];
			$pass = md5($_POST['user_pass']);

			if (empty($name) or empty($email)or empty($pass)){
				$error = 'All fileds are required !';
			}else{
				$qurey = $pdo->prepare('INSERT INTO users (user_name,user_email,user_pass) VALUES (?,?,?)');
				$qurey->bindValue(1,$name);
				$qurey->bindValue(2,$email);
				$qurey->bindValue(3,$pass);

				$qurey->execute();

				header ('location:index.php');

			}
		}

	?>


<!DOCTYPE html>
<html>
<head>
	<title>BANGLADESH || SinUp</title>
	<link rel="icon" href="img/bd.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<form action="sinup.php" method="post" autocomplete="off" >
		<div class="loginBox"  style="height:500px;">
			
			<h2>Sign Up</h2>
					<?php if (isset($error)){
					echo "<small style='color:red;'>$error<small><br/><br/>";
				} ?>
			<p>Your Name</p>
			<input type="text" name="user_name" placeholder="Enter Your Name">
			<p>Email</p>
			<input type="email" name="user_email" placeholder="Enter Email">
			<p>Password</p>
			<input type="Password" name="user_pass" placeholder="........">
			<input type="submit" name="" value="Sign Up">
			<a href="login.php">Login</a>
		</div>
	</form>
</body>
</html>