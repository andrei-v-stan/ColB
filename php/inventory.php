<?php
  require_once('connectDB.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/inventoory.css" />
    <link rel="shortcut icon" href="#">
    <script src="../js/inventoryScript.js" defer></script>
    <script src="../js/inventoryHandleTouch.js" defer></script>
    <title>Inventory</title>
  </head>
  <body>
    <div class="inventory">
      <nav>
        <div class="categories">
          <?php
              #Display all categories
             
                $uid = $_COOKIE['id'];
                if(!isset($uid)){
                  header("Location: ../html/login.html");
                  exit();
              }
              
              // $query1 = "SELECT id, categorie FROM categorii";
              $query1 = "SELECT DISTINCT categorii.id, categorii.categorie FROM `colectie` JOIN `categorii` ON colectie.CategoryID = categorii.id WHERE colectie.uid = $uid";
              $response1 = mysqli_query($con, $query1);
              if($response1){
                  while($row = mysqli_fetch_array($response1)) {
                      $catID = $row['id'];
                      $cat = $row['categorie'];

                      echo 
                      "<div class='category'>" . 
                        "<button class='btn btn-cat'>$cat</button>" .
                        '<div class="subcategories">';
                        #Display all subcategories
                        // $query2 = "SELECT id, subcategorie FROM subcategorii  WHERE `catID` = $catID";
                        $query2 = "SELECT DISTINCT subcategorii.id, subcategorii.subcategorie FROM `colectie` JOIN `subcategorii` ON colectie.SubcategoryID = subcategorii.id WHERE colectie.uid = $uid AND subcategorii.catID = $catID";
                        $response2 = mysqli_query($con, $query2);
                        if($response2){
                          while($row2 = mysqli_fetch_array($response2)) {
                              $subcatID = $row2['id'];
                              $subcat = $row2['subcategorie'];

                              echo 
                                '<div class="subcategory">' .
                                  "<button class='btn btn-subcat'>$subcat</button>" .
                                  '<div class="items">';
                                  #Display all items
                                  // $query3 = "SELECT * FROM `colectie` WHERE `CategoryID` = $catID AND `SubcategoryID` = $subcatID ";
                                  $query3 = "SELECT colectie.id AS itemID, pfName, country, city, phoneNr, ProductName, CategoryID, SubcategoryID, Used, FabricationYear, MadeIn, BoughtIn, Details, Exchange, Price, img
                                    FROM `colectie` JOIN `users` ON colectie.uid = users.id WHERE colectie.uid = $uid AND colectie.CategoryID = $catID AND colectie.SubcategoryID = $subcatID";
                                  $response3 = mysqli_query($con, $query3);
                                  if($response3){
                                    while($row3 = mysqli_fetch_array($response3)) {
                                      // echo "<script>alert('BUN')</script>";
                                      $itemID = $row3['itemID'];
                                      // $itemName = $row3['ProductName'];
                                      // echo "<button class='btn btn-item' value='$itemID'>
                                      //   $itemName
                                      // </button>";
                                      $OwnerName = $row3['pfName'];
                                      $Country = $row3['country'];
                                      $City = $row3['city'];
                                      $PhoneNr = $row3['phoneNr'];
                                      $ProductName = $row3['ProductName'];
                                      $CategoryID = $row3['CategoryID'];
                                      $Category = mysqli_fetch_array(mysqli_query($con, "SELECT categorie FROM categorii  WHERE `id` = $CategoryID"))['categorie'];
                                      $SubcategoryID = $row3['SubcategoryID'];
                                      $Subcategory = mysqli_fetch_array(mysqli_query($con, "SELECT subcategorie FROM subcategorii  WHERE `id` = $SubcategoryID"))['subcategorie'];
                                      $Used = $row3['Used'] ? 'Yes' : 'No';
                                      $FabricationYear = $row3['FabricationYear'];
                                      $MadeIn = $row3['MadeIn'];
                                      $BoughtIn = $row3['BoughtIn'];
                                      $Details = $row3['Details'];
                                      $Exchange = $row3['Exchange'] ? 'Yes' : 'No';
                                      $Price = $row3['Price'];
                                      $img = $row3['img'];
                                      echo 
                                      "<button class='btn-item' value='$itemID'>
                                          <div class='item-title'>$ProductName</div>
                                          <div class='item-owner'>
                                              Owner: <span class='text'>$OwnerName</span> <br>
                                              Country: <span class='text'>$Country</span> <br>
                                              City: <span class='text'>$City</span> <br>
                                              Phone: <span class='text'>$PhoneNr</span> <br>
                                          </div>
                                          <div class='item-data'>
                                              Category: <span class='text'>$Category</span> <br>
                                              Subcategory: <span class='text'>$Subcategory</span> <br>
                                              Fabrication Year: <span class='text'>$FabricationYear</span> <br>
                                              Made in: <span class='text'>$MadeIn</span> <br>
                                              Bought in: <span class='text'>$BoughtIn</span> <br>
                                              Used: <span class='text'>$Used</span> <br>
                                              Exchange: <span class='text'>$Exchange</span> <br>
                                              Price: <span class='text'>$Price</span> <br>
                                          </div>
                                          <div class='item-details'>
                                              <span class='text'>$Details</span> <br>
                                              <img class='item-img' src='$img' alt='A picture of $ProductName'>
                                          </div>
                                      </button>";
                                    }
                                  }

                              echo 
                                  "</div>" . 
                                "</div>";
                          }
                        }
                      echo 
                        "</div>" . 
                      "</div>";
                  }
              }
          ?>
        </div>
      </nav>
      <div class="wrapp">
        <button class="btn btn-share">Share</button>
        <button class="btn-add btn-add--plus">
          <span class="content">+</span>
        </button>
      </div>
    </div>

    <div class="add-element-wrapper">
      <div class="select-element">
        <button class="btn-add" id="add-cat">
          <span class="content">+ Categorie</span>
        </button>
        <button class="btn-add" id="add-subcat">
          <span class="content">+ Subcategorie</span>
        </button>
        <button class="btn-add" id="add-item">
          <span class="content">+ Item</span>
        </button>
      </div>

      <!-- ADD CATEGORIES -->
      <form action="inventory.php" method="post" class="add-cat-form">
        <div class="title">Categorie</div>
        <div class="subtitle">Creeaza o categorie noua!</div>
        <div class="input-container">
          <input id="cat-name" class="input" type="text" name="cat--name" placeholder=" " />
          <div class="cut"></div>
          <label for="cat-name" class="placeholder">Nume categorie</label>
        </div>
        <input type="submit" class="submit" value="Submit" name="submit-cat">
      </form>
      <?php
        if(isset($_POST["cat--name"])){
          $cathegory = $_POST["cat--name"];
          if(!empty($cathegory)){
            try {
              $query = "INSERT INTO `categorii` (`id`, `categorie`) VALUES (NULL, '$cathegory')";
              mysqli_query($con, $query);
            } catch(Exception $e) {}
          }
        }
      ?>

      <!-- ADD SUBCATEGORIES -->
      <form action="inventory.php" method="post" class="add-subcat-form">
        <div class="title">Subcategorie</div>
        <div class="subtitle">Creeaza o subcategorie noua!</div>
        <div class="input-container">
          <label for="sel-cat"></label>
          <select name="category" id="sel-cat" class="input">
            <?php
              $query = "SELECT id, categorie FROM categorii";
              $response = mysqli_query($con, $query);
              if($response){
                  while($row = mysqli_fetch_array($response)) {
                      $id = $row['id'];
                      $cat = $row['categorie'];
                      echo "<option value='$id'>$cat</option>";
                  }
              }
            ?>
          </select>
        </div>
        <div class="input-container">
          <input id="subcat-name" class="input" type="text" name="subcat--name" placeholder=" " />
          <div class="cut"></div>
          <label for="subcat-name" class="placeholder">Nume subcategorie</label>
        </div>
        <input type="submit" class="submit" value="Submit" name="submit-subcat">
      </form>
      <?php
        if(isset($_POST['submit-subcat'])){
          if(!empty($_POST['category'])) {
            $catID = $_POST["category"];

            if(!empty($_POST['subcat--name'])) {
              try {
                $subcathegory = $_POST["subcat--name"];
                $query = "INSERT INTO `subcategorii` (`catID`, `subcategorie`, `id`) VALUES ('$catID', '$subcathegory', NULL)";
                mysqli_query($con, $query);
              } catch(Exception $e) {}
            } else {
              echo '<script>alert("Enter a name for the subcategory")</script>';
            }
          } else {
            echo '<script>alert("Select a category")</script>';
          }
        }
      ?>

      <!-- ADD ITEMS -->
      <form action="inventory.php" method="post" class="add-item-form">
        <div class="title">Iteme</div>
        <div class="subtitle">Creeaza un item nou!</div>
        
        <!-- <div class="input-container">
          <input name="owner" id="owner" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="owner" class="placeholder">Owner</label>
        </div>
        <div class="input-container">
          <input name="country" id="country" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="country" class="placeholder">Country</label>
        </div>
        <div class="input-container">
          <input name="city" id="city" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="city" class="placeholder">City</label>
        </div>
        <div class="input-container">
          <input name="phoneNr" id="phoneNr" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="phoneNr" class="placeholder">Phone Number</label>
        </div> -->
        <div class="input-container">
          <input name="productName" id="productName" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="productName" class="placeholder">Product Name</label>
        </div>
        <div class="input-container">
          <select name="i-category" id="sel-cat2" class="input">
          <?php
              $query = "SELECT id, categorie FROM categorii";
              $response = mysqli_query($con, $query);
              if($response){
                  while($row = mysqli_fetch_array($response)) {
                      $id = $row['id'];
                      $cat = $row['categorie'];
                      echo "<option value='$id'>$cat</option>";
                  }
              }
            ?>
          </select>
          <div class="cut"></div>
          <label for="sel-cat2" class="placeholder">Category</label>
        </div>
        <div class="input-container">
          <select name="i-subcategory" id="sel-subcat" class="input">
          <?php
            $query = "SELECT id, subcategorie FROM subcategorii";
            $response = mysqli_query($con, $query);
            if($response){
                while($row = mysqli_fetch_array($response)) {
                    $id = $row['id'];
                    $subcat = $row['subcategorie'];
                    echo "<option value='$id'>$subcat</option>";
                }
            }
              // if(!empty($_POST['i-category'])) {
              //   $catID = $_POST["i-category"];

              //   $query = "SELECT id, subcategorie FROM subcategorii WHERE `catID` = $catID";
              //   $response = mysqli_query($con, $query);
              //   if($response){
              //       while($row = mysqli_fetch_array($response)) {
              //           $id = $row['id'];
              //           $subcat = $row['subcategorie'];
              //           echo "<option value='$id'>$subcat</option>";
              //       }
              //   }
              // }
            ?>
          </select>
          <div class="cut"></div>
          <label for="sel-subcat"class="placeholder">Subcategory</label>
        </div>
        <div class="input-container">
          <select name="used" id="used" class="input">
            <option value='0'>No</option>
            <option value='1'>Yes</option>
          </select>
          <div class="cut"></div>
          <label for="used" class="placeholder">Used</label>
        </div>
        <div class="input-container">
          <input name="fabricationYear" id="fabricationYear" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="fabricationYear" class="placeholder">Fabrication Year</label>
        </div>
        <div class="input-container">
          <input name="madeIn" id="madeIn" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="madeIn" class="placeholder">Made in</label>
        </div>
        <div class="input-container">
          <input name="boughtIn" id="boughtIn" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="boughtIn" class="placeholder">Bought in</label>
        </div>
        <div class="input-container">
          <input name="details" id="details" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="details" class="placeholder">Details</label>
        </div>
        <div class="input-container">
          <select name="exchange" id="exchange" class="input">
            <option value='0'>No</option>
            <option value='1'>Yes</option>
          </select>
          <div class="cut"></div>
          <label for="exchange" class="placeholder">Exchange</label>
        </div>
        <div class="input-container">
          <input name="price" id="price" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="price" class="placeholder">Price</label>
        </div>
        <div class="input-container">
          <input name="img" id="img" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="img" class="placeholder">Image</label>
        </div>
        <input type="submit" class="submit" value="Submit" name="submit-item">
      </form>
      <?php
        if(isset($_POST['submit-item'])){
          if(!empty($_POST['productName']) && 
          !empty($_POST['fabricationYear']) && 
          !empty($_POST['madeIn']) && 
          !empty($_POST['boughtIn']) && 
          !empty($_POST['details']) && 
          !empty($_POST['price']) && 
          !empty($_POST['img'])) {
            // $ownerName = $_POST['owner'];
            // $country = $_POST['country'];
            // $city = $_POST['city'];
            // $phoneNr = $_POST['phoneNr'];
            $productName = $_POST['productName'];
            $category = $_POST['i-category'];
            $subcategory = $_POST['i-subcategory'];
            $used = $_POST['used'];
            $fabricationYear = $_POST['fabricationYear'];
            $madeIn = $_POST['madeIn'];
            $boughtIn = $_POST['boughtIn'];
            $details = $_POST['details'];
            $exchange = $_POST['exchange'];
            $price = $_POST['price'];
            $img = $_POST['img'];
            try {
              $query = "INSERT INTO `colectie` (`id`, `uid`, `ProductName`, `CategoryID`, `SubcategoryID`, `Used`, `FabricationYear`, `MadeIn`, `BoughtIn`, `Details`, `Exchange`, `Price`, `img`) VALUES (NULL, '$uid', '$productName', '$category', '$subcategory', '$used', '$fabricationYear', '$madeIn', '$boughtIn', '$details', '$exchange', '$price', '$img')";
              mysqli_query($con, $query);
            } catch(Exception $e) {}
          }
        }
      ?>
    </div>
  </body>
</html>