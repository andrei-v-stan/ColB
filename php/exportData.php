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
    <link rel="shortcut icon" type="image/x-icon" href="../resources/default/Question.ico"/>
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/menus.css">
    <script src="../js/menus.js"></script>

</head>


<body>


<div class="containerM">

    <div class="menuShortcut">

        <button id="menuShortcut-foreground" onclick="focusF(); transform()" class="menuShortcut-button" title="Click to open the shortcuts menu"></button>
        <button id="menuShortcut-background" onclick="focusB(); transformBack()" class="menuShortcut-button" title="Click to close the menu"></button>
        <div class="menuShortcut-Search" id="search" onclick="openWindow('../html/search.html','_self');" ></div>
        <div class="menuShortcut-Post" id="post" onclick="openWindow('../html/post.html','_self');"></div>
        <div class="menuShortcut-Info" id="info" onclick="openWindow('../html/info.html','_self');"></div>

    </div>

    <a class="menuProfile-button" href="../html/login.html" title="Click to open the menu"></a>

</div>

<div id="default">
    <h1>Work In Progress</h1>
</div>


</body>
</html>