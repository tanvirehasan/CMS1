<?php session_start(); if (isset($_SESSION['logged_in'])){}else{header('location:../login.php');} ?>

<?php

$db = new mysqli('localhost', 'root', '', 'cms');

    if (isset($_POST['save'])) {

        $folder = "../img/";
        $target = $folder.basename($_FILES["fileToUpload"]["name"]);
        $title = $_POST['artical_title'];
        $content = $_POST['artical_content'];
        $imageee = $_FILES['fileToUpload']['name'];

        $query = "INSERT INTO articales (artical_title, artical_content,img) VALUES ('$title','$content', '$imageee') ";
              mysqli_query($db,$query);


        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target)) {

            $_SESSION['mag'] = "Info Save ! Thank you";
            header('location:index.php');

         } else {

             $_SESSION['mag'] = "sorry";
              header('location:post.php');

         }

    }
    
?>