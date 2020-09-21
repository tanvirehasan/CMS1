<?php include 'conn.php'; 
//eidit
	if (isset($_GET['edit'] )) {
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM articales WHERE artical_id= $id");
		$record = mysqli_fetch_array($rec);
		$title = $record['artical_title'];
		$content = $record['artical_content'];
		$id = $record['artical_id'];
	}
?>


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

<table>
	<thead>
		<tr>
			<th>Post Title</th>
			<th> Image</th>
			<th>Edit</th>			
			<th colspan="2">Delete</th>
		</tr>
	</thead>
	<tbody>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['artical_title']; ?></td>
			<td> <img style="height: 50px; width: 100px;" src="../img/<?php echo $row['img'];?>"></td>
			<td>
				<a style="color:green" href="index.php?edit=<?php echo $row['artical_id']; ?>"> &#9997; </a>
			</td>
			<td><a style="color:red"  href="conn.php?del=<?php echo $row['artical_id']; ?>">&#9747;</a></td>
			
		</tr>
		<?php } ?>
	</tbody>

	<a href="post.php">Add Post</a> |
	<a href="../index.php">Home</a>
</table>


</body>
</html>