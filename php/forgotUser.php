<?php

include('connectDB.php');


$email = $_POST['email'];


$qry = "SELECT username FROM `users` WHERE email='$email'";
$resultSet = mysqli_query($con,$qry);

if (mysqli_num_rows($resultSet) > 0) {
  while($row = mysqli_fetch_assoc($resultSet)){
        $username = print_r($row['username'], True);
    }

  $receiver = $email;
  $subject = "Username recovery ColB";
  $body = "Dear ColB user, \n\nThis is an automated message sent due to your account recovery request, your username is : '$username' \n\nThe ColB team wishes you a wonderful day.";
  $sender = "From:colbfii@gmail.com";

  if(mail($receiver, $subject, $body, $sender)) {
      echo '<script type="text/javascript">';
      echo 'alert("Your username has been sent via a email to your account");';
      echo 'window.location.href = "../html/login.html";';
      echo '</script>';
  }
  else {
      echo '<script type="text/javascript">';
      echo 'alert("There has been an issue and your username cannot be sent to your account");';
      echo 'window.location.href = "../html/login.html";';
      echo '</script>';
  }

}
else {
    echo '<script type="text/javascript">';
    echo 'alert("There is no account tied to the introduced email");';
    echo 'window.location.href = "../html/forgotUser.html";';
    echo '</script>';
}


mysqli_close($con);
?>
