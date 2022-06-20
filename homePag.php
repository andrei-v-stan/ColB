<?php
include 'connection.php';
include 'functions.php';
if(isset($_GET['search'])){
	$r =  $_GET['search'];
	header("Location: http://localhost/Spage.php?search=$r&pg=1&sort=0");
    exit();
}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="homePag.css">
	<link rel="stylesheet" type="text/css" href="menus.css">
	<title>Home</title>
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




<div class="container">
	<div id="bar">
		<form>
			<h1>Bottle Collector</h1>
			<input type="text" name="search" placeholder="Search for desired Item">
		</form>
	</div>
	<div id="options">
		<div class="option flex-container"> 
			<div class="options flex-container">
      			<?php  $option1 = randOption(0, $conn);  ?>
		      	<ul>
		        	<li><?php echo $option1['t'];?></li>
		        	<li><?php echo $option1['DT'];?></li>
		        	<li><?php echo $option1['p'];?>€</li>
		        	<li><a href="/tst.php?id=<?php echo $option1['id']?>"><b>See Offer</b></a></li>
		      	</ul>
    		</div>
		</div>
		<div class="option  noPhone flex-container"> 
			<div class="options flex-container">
      			<?php  $option2 = randOption(0 , $conn);  ?>
		      	<ul>
		        	<li><?php echo $option2['t'];?></li>
		        	<li><?php echo $option2['DT'];?></li>
		        	<li><?php echo $option2['p'];?>€</li>
		        	<li><a href="/tst.php?id=<?php echo $option2['id']?>"><b>See Offer</b></a></li>
		      	</ul>
    		</div>
		</div>
		<div class="option extra noPhone flex-container"> 
			<div class="options flex-container">
      			<?php  $option3 = randOption(0 , $conn);  ?>
		      	<ul>
		        	<li><?php echo $option3['t'];?></li>
		        	<li><?php echo $option3['DT'];?></li>
		        	<li><?php echo $option3['p'];?>€</li>
		        	<li><a href="/tst.php?id=<?php echo $option3['id']?>"><b>See Offer</b></a></li>
		      	</ul>
    		</div>
		</div>
		<div class="option extra noPhone flex-container"> 
			<div class="options flex-container">
      			<?php  $option4 = randOption(0 , $conn);  ?>
		      	<ul>
		        	<li><?php echo $option4['t'];?></li>
		        	<li><?php echo $option4['DT'];?></li>
		        	<li><?php echo $option4['p'];?>€</li>
		        	<li><a href="/tst.php?id=<?php echo $option4['id']?>"><b>See Offer</b></a></li>
		      	</ul>
    		</div>
		</div>
	</div>
	<footer>
		<h3>Au Lucrat : Visnevschi Vladislav, Stan Andrei-Vladut , Anton Emanuel</h3>
	</footer>
</div>
</body>
<script type="text/javascript" src="menus.js"></script>
</html>