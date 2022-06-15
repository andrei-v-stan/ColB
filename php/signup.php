<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "form"; 

$con = new mysqli($host,$user,$pass,$db);
if (!$con) { 
	echo "[Error] : Cannot connect to the database <br>";
	echo "<br>";
}


$qry = "CREATE TABLE IF NOT EXISTS `users` (username varchar(255), email varchar(255), password varchar(255))";
$insert = mysqli_query($con, $qry);
/*
if (!$insert) {
	echo "[Error] : Cannot create table <br>";
	echo "<br>";
} 
else{ 
	echo "[Info] : Table created <br>";
	echo "<br>";
}
*/

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password']; 




$qry= "SELECT * FROM `users` WHERE username='$username'";
$insert = mysqli_query($con,$qry);
$verf = mysqli_num_rows($insert);

			if($verf >= 1 ) {
				echo "Username already exists!";
			}else{
				$qry = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username','$email','$password')";
                $insert = mysqli_query($con,$qry);
                /*
                if (!$insert) {
                	echo "[Error] : Cannot insert data <br>";
                	echo "<br>";
                }
                else{
                	echo "[Info] : Data inserted <br>";
                }
                */

				echo "Username does not exist, it will now be inserted";
			}

mysqli_close($con);
?>