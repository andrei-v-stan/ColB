<!DOCTYPE html>
<html lang="en">

<head>

  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="resources/index/Home.ico"/>
  <link rel="stylesheet" href="css/index.css">

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

      $qry = "CREATE TABLE IF NOT EXISTS `users` (id int(255), username varchar(255), email varchar(255), password varchar(255), type int(1), pfName varchar(255), phoneNr varchar(255), country varchar(255), city varchar(255))";
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

      $qry = "CREATE TABLE IF NOT EXISTS `prod` (prodID int(10), prodName varchar(20), drink varchar(10), drinkType varchar(10), used tinyint(1), year int(4), madeIn varchar(10), boughtIn varchar(10), details varchar(100), price int(10), exchange tinyint(1))";
      $insert = mysqli_query($con, $qry);

      $qry = "CREATE TABLE IF NOT EXISTS `img` (prodID int(10), imgURL varchar(50))";
      $insert = mysqli_query($con, $qry);


      mysqli_close($con);

  ?>

</head>


<body>


<div class="centeringElements">

  <div class="welcomeAnimation">
    <img src="resources/index/WelcomeC.png" alt="IndexWelcome" class="welcomeResp">
  </div>

  <div id="default">
    <h1>Collecting bottles on Web</h1>
  </div>


  <div class="buttonPlace1">
    <a href="html/scholarly.html" class="buttonGrad purpleB">Scholarly</a>
  </div>
  <div class="buttonPlace2">
    <a href="html/search.html" class="buttonGrad cyanB">Search</a>
  </div>
  <div class="buttonPlace3">
    <a href="html/post.html" class="buttonGrad aquaB">Post</a>
  </div>
  <div class="buttonPlace4">
    <a href="html/login.html" class="buttonGrad tealB">Login</a>
  </div>

</div>

</body>

</html>