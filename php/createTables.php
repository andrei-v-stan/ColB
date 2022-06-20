<?php
      include('php/connectDB.php');

        $qry = "CREATE TABLE IF NOT EXISTS `users` (id int(255) AUTO_INCREMENT, username varchar(255), email varchar(255), password varchar(255), type int(1), pfName varchar(255), phoneNr varchar(255), country varchar(255), city varchar(255), PRIMARY KEY (id))";
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

        $qry = "CREATE TABLE IF NOT EXISTS `colectie` (userID int(10), id int(10) unsigned NOT NULL AUTO_INCREMENT, OwnerName varchar(50) NOT NULL, Country varchar(50) NOT NULL, City varchar(50) NOT NULL, PhoneNr varchar(13) NOT NULL, ProductName varchar(50) NOT NULL, CategoryID int(10) unsigned NOT NULL, SubcategoryID int(10) unsigned NOT NULL, Used tinyint(1) NOT NULL, FabricationYear int(10) unsigned NOT NULL, MadeIn varchar(30) NOT NULL, BoughtIn varchar(30) NOT NULL, Details varchar(300) NOT NULL, Exchange tinyint(1) NOT NULL, Price int(10) unsigned NOT NULL, img varchar(100) NOT NULL, PRIMARY KEY (id), UNIQUE KEY ProductName (ProductName)) DEFAULT CHARSET=utf8mb4";
        $insert = mysqli_query($con, $qry);

        $qry = "CREATE TABLE IF NOT EXISTS `categorii` (userID int(10), id int(10) unsigned NOT NULL AUTO_INCREMENT, categorie varchar(30) NOT NULL, PRIMARY KEY (id), UNIQUE KEY categorie (categorie)) DEFAULT CHARSET=utf8mb4";
        $insert = mysqli_query($con, $qry);

        $qry = "CREATE TABLE IF NOT EXISTS `subcategorii` (userID int(10), catID int(10) unsigned NOT NULL, subcategorie varchar(50) NOT NULL, id int(10) unsigned NOT NULL AUTO_INCREMENT, PRIMARY KEY (id), UNIQUE KEY subcategorie (subcategorie)) DEFAULT CHARSET=utf8mb4";
        $insert = mysqli_query($con, $qry);


        mysqli_close($con);
?>