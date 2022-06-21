<?php

include('connectDB.php');

$id = $_COOKIE['id'];

$qry = "SELECT type FROM `users` WHERE id='$id'";
        $resultSet = mysqli_query($con,$qry);

        if (mysqli_num_rows($resultSet) > 0) {
          while($row = mysqli_fetch_assoc($resultSet)){
               $type = print_r($row['type'], TRUE);
            }
        }

if ($type == 0) {
    echo '<script type="text/javascript">';
    echo 'alert("Only admins are allowed here!");';
    echo 'window.location.href = "../html/profile.html";';
    echo '</script>';
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/menus.css">
    <script src="../js/menus.js"></script>

</head>


<body>

<div class="containerM">

  <div class="menuShortcut">

    <button id="menuShortcut-foreground" onclick="focusF(); transform()" class="menuShortcut-button" title="Click to open the shortcuts menu"></button>
    <button id="menuShortcut-background" onclick="focusB(); transformBack()" class="menuShortcut-button" title="Click to close the menu"></button>
    <div class="menuShortcut-Search" id="search" onclick="openWindow('../html/search.html','_self');" title="Click to open the search webpage"></div>
    <div class="menuShortcut-Post" id="post" onclick="openWindow('../html/post.html','_self');" title="Click to open the post webpage"></div>
    <div class="menuShortcut-Info" id="info" onclick="openWindow('../html/aboutUs.html','_self');" title="Click to open the about us webpage"></div>

  </div>

  <button id="menuProfile-foreground" onclick="focusPfF(); transformPf()" class="menuProfile-button" title="Click to open the profile menu"></button>
  <button id="menuProfile-background" onclick="focusPfB(); transformBackPf()" class="menuProfile-button" title="Click to close the menu"></button>
  <div class="menuProfile-Login" id="login" onclick="openWindow('../html/login.html','_self');" title="Click to open the login webpage"></div>
  <div class="menuProfile-Profile" id="profile" onclick="openWindow('../php/profile.php','_self');" title="Click to open the profile webpage"></div>
  <div class="menuProfile-Inventory" id="inventory" onclick="openWindow('../php/inventory.php','_self');" title="Click to open the inventory webpage"></div>

</div>

<div id="default">
    <h1>Work In Progress</h1>
</div>


</body>
</html>