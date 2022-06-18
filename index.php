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

      $qry = "CREATE TABLE IF NOT EXISTS `users` (id int(255), username varchar(255), email varchar(255), password varchar(255), type int(1), pfName varchar(255),phoneNr int(255), country varchar(255), city varchar(255))";
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

      $qry = "CREATE TABLE IF NOT EXISTS `prod` (ID int(10), Nume_prenume varchar(25), produsNume varchar(20), country varchar(10), Mun varchar(10), Oras varchar(10), Drink varchar(10), DrinkType varchar(10), Used tinyint(1), year int(4), MadeIn varchar(10), BoughtIn varchar(10), Details varchar(100), Price int(10), Exhange tinyint(1), PhoneNr int(15), imagesNr int(1), img1 varchar(50), img2 varchar(50), img3 varchar(50))";
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