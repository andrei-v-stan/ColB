<?php

include('connectDB.php');


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$type = 0;


$qry = "SELECT * FROM `users` WHERE username='$username'";
$insert = mysqli_query($con,$qry);
$vUsername = mysqli_num_rows($insert);

$qry = "SELECT * FROM `users` WHERE email='$email'";
$insert = mysqli_query($con,$qry);
$vEmail = mysqli_num_rows($insert);

			if($vUsername >= 1 && $vEmail >= 1) {
			    echo '<script type="text/javascript">';
                echo 'alert("The username and email entered are in use, please enter different ones \nOr recover your account at the login page");';
                echo 'window.location.href = "../html/signup.html";';
                echo '</script>';
			}
			else if($vUsername >= 1 && $vEmail == 0) {
                echo '<script type="text/javascript">';
                echo 'alert("The username entered is not available, please enter a new one");';
                echo 'window.location.href = "../html/signup.html";';
                echo '</script>';
            }
            else if($vUsername == 0 && $vEmail >= 1) {
                echo '<script type="text/javascript">';
                echo 'alert("The email entered is in use, please enter a different one \nOr recover your account at the login page");';
                echo 'window.location.href = "../html/signup.html";';
                echo '</script>';
            }
			else if($vUsername == 0 && $vEmail == 0) {
				$qry = "INSERT INTO `users` (`username`, `email`, `password`, `type`) VALUES ('$username','$email','$password','$type')";
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

				echo '<script type="text/javascript">';
                echo 'alert("Your account has been created, you can now login");';
                echo 'window.location.href = "../html/login.html";';
                echo '</script>';
			}
			else {
			    echo "[Error] : All cases skipped";
			}

mysqli_close($con);
?>
