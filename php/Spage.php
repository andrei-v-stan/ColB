
<?php 
include 'connectDB.php';
include 'functions.php';
$r =  $_GET['search'];
$p = $_GET['pg'];
$s = $_GET['sort'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="Spage.css">
  <link rel="stylesheet" type="text/css" href="menus.css">
  <title><?php echo $r?></title>
</head>
<body>



<div class="containerM">

  <div class="menuShortcut">

    <button id="menuShortcut-foreground" onclick="focusF(); transform()" class="menuShortcut-button" title="Click to open the shortcuts menu"></button>
    <button id="menuShortcut-background" onclick="focusB(); transformBack()" class="menuShortcut-button" title="Click to close the menu"></button>
    <div class="menuShortcut-Search" id="search" onclick="openWindow('../html/search.html','_self');" title="Click to open the search webpage"></div>
    <div class="menuShortcut-Post" id="post" onclick="openWindow('../html/post.html','_self');" title="Click to open the post webpage"></div>
    <div class="menuShortcut-Info" id="info" onclick="openWindow('../html/info.html','_self');" title="Click to open the info webpage"></div>

  </div>

  <button id="menuProfile-foreground" onclick="focusPfF(); transformPf()" class="menuProfile-button" title="Click to open the profile menu"></button>
  <button id="menuProfile-background" onclick="focusPfB(); transformBackPf()" class="menuProfile-button" title="Click to close the menu"></button>
  <div class="menuProfile-Login" id="login" onclick="openWindow('../html/login.html','_self');" title="Click to open the login webpage"></div>
  <div class="menuProfile-Profile" id="profile" onclick="openWindow('../html/profile.html','_self');" title="Click to open the profile webpage"></div>
  <div class="menuProfile-Inventory" id="inventory" onclick="openWindow('../php/inventory.php','_self');" title="Click to open the inventory webpage"></div>

</div>



<div class="grid-container">
  <div class="item1"></div>
  <div class="item2 flex-container">
    <div class="options flex-container">
            <?php  $option1 = randOption(0, $con);  ?>
            <ul>
              <li><?php echo $option1['t'];?></li>
              <li><?php echo $option1['DT'];?></li>
              <li><?php echo $option1['p'];?>€</li>
              <li><a href="/tst.php?id=<?php echo $option1['id']?>"><b>See Offer</b></a></li>
            </ul>
    </div>
    <div class="options flex-container">
            <?php  $option1 = randOption(0, $con);  ?>
            <ul>
              <li><?php echo $option1['t'];?></li>
              <li><?php echo $option1['DT'];?></li>
              <li><?php echo $option1['p'];?>€</li>
              <li><a href="/tst.php?id=<?php echo $option1['id']?>"><b>See Offer</b></a></li>
            </ul>
    </div>
    <div class="options flex-container">
            <?php  $option1 = randOption(0, $con);  ?>
            <ul>
              <li><?php echo $option1['t'];?></li>
              <li><?php echo $option1['DT'];?></li>
              <li><?php echo $option1['p'];?>€</li>
              <li><a href="/tst.php?id=<?php echo $option1['id']?>"><b>See Offer</b></a></li>
            </ul>
    </div>
  </div>
  <div class="item3">
    <div class="row">
      <ul>
        <li>Sort By</li>
        <li><a href="http://localhost/Spage.php?search=<?php echo $r ?>&pg=1&sort=1">Cheapest</a></li>
        <li><a href="http://localhost/Spage.php?search=<?php echo $r ?>&pg=1&sort=2">Most Expensive</a></li>
      </ul>
    </div>
    <div class="results flex-container">
      <?php SearchFor($r, $con,$p ,$s)?>
    </div>
    <div class="row">
      <ul>
        <?php getPages($r, $con,$p, $s) ?>
      </ul>
    </div>
  </div>  
</div>
</body>
<script type="text/javascript" src="menus.js"></script>
</html>