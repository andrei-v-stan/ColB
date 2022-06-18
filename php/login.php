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


$username = $_POST['username'];
$password = $_POST['password'];
$verf = 1;
$vType = 0;


$qry = "SELECT password FROM `users` WHERE username='$username'";
$resultSet = mysqli_query($con,$qry);

if (mysqli_num_rows($resultSet) > 0) {
  while($row = mysqli_fetch_assoc($resultSet)){
        $vPassword = print_r($row['password'], True);
    }
}
else {
    $qry = "SELECT password FROM `users` WHERE email='$username'";
    $resultSet = mysqli_query($con,$qry);

    if (mysqli_num_rows($resultSet) > 0) {
      while($row = mysqli_fetch_assoc($resultSet)){
            $vPassword = print_r($row['password'], True);
        }
    }
    else {

        echo '<script type="text/javascript">';
        echo 'alert("The username or password is incorrect");';
        echo 'window.location.href = "../html/login.html";';
        echo '</script>';
        $verf = 0;
    }
}

if ($verf == 1 && $password == $vPassword) {

    $qry = "SELECT type FROM `users` WHERE username='$username'";
    $resultSet = mysqli_query($con,$qry);

    if (mysqli_num_rows($resultSet) > 0) {
      while($row = mysqli_fetch_assoc($resultSet)){
           $vType = print_r($row['type'], TRUE);
        }
    }

    if($vType == 1){
        echo '<script type="text/javascript">';
        echo 'alert("You have logged in successfully");';
        echo 'window.location.href = "../html/profileAdmin.html";';
        echo '</script>';

    }
    else{
        echo '<script type="text/javascript">';
        echo 'alert("You have logged in successfully");';
        echo 'window.location.href = "../html/profile.html";';
        echo '</script>';
    }

  }
else {
    echo '<script type="text/javascript">';
    echo 'alert("The username or password is incorrect");';
    echo 'window.location.href = "../html/login.html";';
    echo '</script>';
    $verf = 0;
}

mysqli_close($con);
?>
