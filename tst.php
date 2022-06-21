
<?php
include 'connection.php';
include 'functions.php';
//sql querry example
//get a random Item

$r =  $_GET['id'];
$myObj = mainObj($r, $conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="myObject.css">
  <link rel="stylesheet" type="text/css" href="menus.css">
  <link rel="stylesheet" type="text/css" href="scroll.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>myObj</title>
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
  
  <nav></nav>
  <div id = "big_img_container" onclick="hideImg()">
  </div>
  <img id = "big_img" onclick="nextImg()" src="1.png" alt="imagine">
  <main>
    <button onclick="prevImg()"></button>
    <img id = "image_display" src="<?php echo $myObj['img1'];?>" alt="imagine" onclick="showImg()">
    <button onclick="nextImg()">></button>
  </main>
  
  <div class="flex-container" id="sidebar">
    <div class="options flex-container">
      <?php  $option1 = randOption($r , $conn);  ?>
      <ul>
        <li><?php echo $option1['t'];?></li>
        <li><?php echo $option1['DT'];?></li>
        <li><?php echo $option1['p'];?>€</li>
        <li><a href="/tst.php?id=<?php echo $option1['id']?>"><b>See Offer</b></a></li>
      </ul>
    </div>
    <div class="options flex-container">
      <?php  $option2 = randOption($r , $conn);  ?>
      <ul>
        <li><?php echo $option2['t'];?></li>
        <li><?php echo $option2['DT'];?></li>
        <li><?php echo $option2['p'];?>€</li>
        <li><a href="/tst.php?id=<?php echo $option2['id']?>"><b>See Offer</b></a></li>
      </ul>
    </div>
    <div class="options flex-container">
      <?php  $option3 = randOption($r , $conn);  ?>
      <ul>
        <li><?php echo $option3['t'];?></li>
        <li><?php echo $option3['DT'];?></li>
        <li><?php echo $option3['p'];?>€</li>
        <li><a href="/tst.php?id=<?php echo $option3['id']?>"><b>See Offer</b></a></li>
      </ul>
    </div>
  </div>
  
  <div class="flex-container" id="content1">
    <p class="content_title">Location</p>
    <ul>
      <li><?php echo $myObj['country'];?></li>
      <li><?php echo $myObj['Mun'];?></li>
      <li><?php echo $myObj['oras'];?></li>
      <li></li>
    </ul>
    </div>
  
  <div class="flex-container" id="content2">
    <p class="content_title">Product</p>
    <ul>
    <li><?php echo $myObj['Drink'];?></li>
    <li><?php checkUsed($myObj['used']);?></li>
    <li>made in <?php echo $myObj['year'];?></li>
    <li><?php echo $myObj['DT'];?></li>
    </ul>
  </div>
  
  <div class="flex-container" id="content3">
    <p class="content_title">History</p>
    <ul>
      <li>Made in <?php echo $myObj['MI'];?></li>
      <li>Bought in <?php echo $myObj['BI'];?></li>
      <li id="double_li"><?php echo $myObj['det'];?></li>
    </ul>
  </div>
  
  <footer>
    <ul>
      <li><?php echo $myObj['price'];?>€</li>
      <li><?php echo $myObj['user'];?></li>
      <li> Exchanege <?php checkEx($myObj['Ex'])?></li>
      <li><?php echo $myObj['Nr'];?></li>
      <li><?php echo $myObj['name'];?></li>
    </ul>
  </footer>
</div>

<script>
  let index = 0
  function nextImg() {
    if (index==0) {
        document.getElementById("image_display").src = "<?php echo $myObj['img2'];?>";  
        document.getElementById("big_img").src = "<?php echo $myObj['img2'];?>";  
        index++;
      }else if (index==1) {
        document.getElementById("image_display").src = "<?php echo $myObj['img3'];?>";    
        document.getElementById("big_img").src = "<?php echo $myObj['img3'];?>";
        index++;
      }else if (index ==2){
        document.getElementById("image_display").src = "<?php echo $myObj['img1'];?>";
        document.getElementById("big_img").src = "<?php echo $myObj['img1'];?>";
        index = 0;
      }
  };
  function prevImg(){
    console.debug(index)
    if (index==0) {
      document.getElementById("image_display").src = "<?php echo $myObj['img3'];?>";
      document.getElementById("big_img").src = "<?php echo $myObj['img3'];?>";
      index = 2;   
    }else if (index ==1) {
      document.getElementById("image_display").src = "<?php echo $myObj['img1'];?>";
      document.getElementById("big_img").src = "<?php echo $myObj['img1'];?>";
      index--;   
    }else if (index ==2) {
      document.getElementById("image_display").src = "<?php echo $myObj['img2'];?>";
      document.getElementById("big_img").src = "<?php echo $myObj['img2'];?>";
      index--;   
    }
  };
  function showImg(){
    document.getElementById("big_img").style.cssText = "display:block"
    document.getElementById("big_img_container").style.cssText = "display:block"

  }
  function hideImg(){
    document.getElementById("big_img").style.cssText = "display:none"
    document.getElementById("big_img_container").style.cssText = "display:none"

  }
</script>
<script type="text/javascript" src="menus.js"></script>
<?php mysqli_close($conn);?>
</body>
</html>