<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "colb";

$con = new mysqli($host,$user,$pass,$db);
if (!$con) { 
	echo "[Error] : Cannot connect to the database <br>";
	echo "<br>";
}


$pfName = $_POST['name'];
$phoneNr = $_POST['phoneNr'];
$country = $_POST['country'];
$city = $_POST['city'];
$id = $_COOKIE['id'];


$qry = "UPDATE `users` SET pfName='$pfName' WHERE id='$id'";
$resultSet = mysqli_query($con,$qry);
$qry = "UPDATE `users` SET phoneNr='$phoneNr' WHERE id='$id'";
$resultSet = mysqli_query($con,$qry);
$qry = "UPDATE `users` SET country='$country' WHERE id='$id'";
$resultSet = mysqli_query($con,$qry);
$qry = "UPDATE `users` SET city='$city' WHERE id='$id'";
$resultSet = mysqli_query($con,$qry);


echo '<script type="text/javascript">';
echo 'window.location.href = "../html/post.html";';
echo '</script>';

mysqli_close($con);
?>
