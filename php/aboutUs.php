<?php

include('connectDB.php');

$name = $_POST['name'];
$email = $_POST['email'];
$question = $_POST['question'];
$explanation = $_POST['explanation'];
$id = $_COOKIE['id'];

if($name == '')
{
    $qry = "SELECT pfName FROM `users` WHERE id='$id'";
    $resultSet = mysqli_query($con,$qry);

    if (mysqli_num_rows($resultSet) > 0) {
      while($row = mysqli_fetch_assoc($resultSet)){
            $name = print_r($row['pfName'], True);
        }
    }
}

if($email == '')
{
    $qry = "SELECT email FROM `users` WHERE id='$id'";
    $resultSet = mysqli_query($con,$qry);

    if (mysqli_num_rows($resultSet) > 0) {
      while($row = mysqli_fetch_assoc($resultSet)){
            $email = print_r($row['email'], True);
        }
    }
}

  $receiver = 'colbfii@gmail.com';
  $subject = $question;
  $body = $name;
  $body .= " (";
  $body .= $email;
  $body .= ") ";
  $body .= ", says :\n\n";
  $body .= $explanation;
  $sender = "From:";
  $sender .= $email;

  if(mail($receiver, $subject, $body, $sender)) {
      echo '<script type="text/javascript">';
      echo 'alert("Your contact information has been sent to us");';
      echo 'window.location.href = "../html/aboutUs.html";';
      echo '</script>';
  }
  else {
      echo '<script type="text/javascript">';
      echo 'alert("There has been an issue and your information cannot be sent at the time");';
      echo 'window.location.href = "../html/aboutUs.html";';
      echo '</script>';
  }


mysqli_close($con);
?>
