<?php
  require_once('mysqli_connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/share.css" />
    <link rel="shortcut icon" href="#">
    <title>Share</title>
</head>

<body>
    <div class="items">
        <?php
        #Get query params from url(the id of the selected items)
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);

        foreach ($queries as $id) {
            #Get and diplay selected items
            $query = "SELECT * FROM `colectie` WHERE `id` = $id";
            $response = mysqli_query($conn, $query);
            if ($response) {
                while ($row = mysqli_fetch_array($response)) {
                    $OwnerName = $row['OwnerName'];
                    $Country = $row['Country'];
                    $City = $row['City'];
                    $PhoneNr = $row['PhoneNr'];
                    $ProductName = $row['ProductName'];
                    $CategoryID = $row['CategoryID'];
                    $Category = mysqli_fetch_array(mysqli_query($conn, "SELECT categorie FROM categorii  WHERE `id` = $CategoryID"))['categorie'];
                    $SubcategoryID = $row['SubcategoryID'];
                    $Subcategory = mysqli_fetch_array(mysqli_query($conn, "SELECT subcategorie FROM subcategorii  WHERE `id` = $SubcategoryID"))['subcategorie'];
                    $Used = $row['Used'] ? 'Yes' : 'No';
                    $FabricationYear = $row['FabricationYear'];
                    $MadeIn = $row['MadeIn'];
                    $BoughtIn = $row['BoughtIn'];
                    $Details = $row['Details'];
                    $Exchange = $row['Exchange'] ? 'Yes' : 'No';
                    $Price = $row['Price'];
                    $img = $row['img'];
                    echo 
                    "<button class='item'>
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
        }
        ?> 
    </div>
</body>

</html>