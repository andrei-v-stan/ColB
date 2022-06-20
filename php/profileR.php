<?php

include('connectDB.php');

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
echo 'alert("Your profile details have been changed successfully");';
echo 'window.location.href = "../php/profile.php";';
echo '</script>';

mysqli_close($con);
?>
