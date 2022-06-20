<?php

include('connectDB.php');


$username = $_POST['username'];
$password = $_POST['password'];
$verf = 1;
$vType = 0;
$id;


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
        $verf = 0;
        echo '<script type="text/javascript">';
        echo 'alert("The username or password is incorrect");';
        echo 'window.location.href = "../html/login.html";';
        echo '</script>';
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
    else {
        $qry = "SELECT type FROM `users` WHERE email='$username'";
        $resultSet = mysqli_query($con,$qry);

        if (mysqli_num_rows($resultSet) > 0) {
          while($row = mysqli_fetch_assoc($resultSet)){
               $vType = print_r($row['type'], TRUE);
            }
        }
    }

    $qry = "SELECT id FROM `users` WHERE username='$username'";
    $resultSet = mysqli_query($con,$qry);

    if (mysqli_num_rows($resultSet) > 0) {
          while($row = mysqli_fetch_assoc($resultSet)){
               $id = print_r($row['id'], TRUE);
            }
        }
    else {
        $qry = "SELECT type FROM `users` WHERE email='$username'";
        $resultSet = mysqli_query($con,$qry);

        if (mysqli_num_rows($resultSet) > 0) {
          while($row = mysqli_fetch_assoc($resultSet)){
               $id = print_r($row['id'], TRUE);
            }
        }
    }

    if($vType == 1) {
            echo '<script type="text/javascript">';
            echo 'alert("You have logged in successfully");';
            echo 'window.location.href = "../html/profileAdmin.html";';
            echo '</script>';
        }
        else {
            echo '<script type="text/javascript">';
            echo 'alert("You have logged in successfully");';
            echo 'window.location.href = "../html/profile.html";';
            echo '</script>';
        }

     if (isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
        setcookie('id', $id, 0,"/");
    }

    setcookie('id', $id, time() + (86400 * 30),"/");
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
