
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>myObj</title>
</head>
<body>

<div class="container">
  
  <nav><form><input type="text" placeholder="NavBar"></form></nav>
  <div id = "big_img_container" onclick="hideImg()">
  </div>
  <img id = "big_img" onclick="nextImg()" src="1.png" alt="imagine">
  <main>
    <button onclick="prevImg()"></button>
    <img id = "image_display" src="<?php echo $myObj['src'];?>" alt="imagine" onclick="showImg()">
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
    </ul>
  </footer>
</div>

<script>
  let index = 0
  function nextImg() {
    if (index==0) {
        document.getElementById("image_display").src = "2.png";  
        document.getElementById("big_img").src = "2.png";  
        index++;
      }else if (index==1) {
        document.getElementById("image_display").src = "3.png";    
        document.getElementById("big_img").src = "3.png";
        index++;
      }else if (index ==2){
        document.getElementById("image_display").src = "1.png";
        document.getElementById("big_img").src = "1.png";
        index = 0;
      }
  };
  function prevImg(){
    console.debug(index)
    if (index==0) {
      document.getElementById("image_display").src = "3.png";
      document.getElementById("big_img").src = "3.png";
      index = 2;   
    }else if (index ==1) {
      document.getElementById("image_display").src = "1.png";
      document.getElementById("big_img").src = "1.png";
      index--;   
    }else if (index ==2) {
      document.getElementById("image_display").src = "2.png";
      document.getElementById("big_img").src = "2.png";
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
</body>
</html>