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
?>