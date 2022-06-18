<?php
include 'connection.php';
include 'functions.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="homePag.css">
	<title>Home</title>
</head>
<body>
<div class="container">
	<div id="top">topBar</div>
	<div id="bar">
		<form>
			<h1>Bottle Collector</h1>
			<input type="text" placeholder="Search for desired Item">
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
</html>