<?php

function checkUsed($bol){
  if ($bol) {
    echo "used";
  }else{
    echo 'unused';
  }
}
function checkEx($bol){
  if ($bol) {
    echo "available";
  }else{
    echo 'unavailable';
  }
}
function randOption($currentID, $conn){
  $sql = "SELECT * FROM Prod";
  $max =mysqli_num_rows(mysqli_query($conn,$sql));
  $itemID = rand(1,$max);
  while ($itemID == $currentID) {
    $itemID = rand(1,mysqli_num_rows(mysqli_query($conn,$sql)));
  }
  $sql = "SELECT * FROM Prod WHERE `ID`= {$itemID}";
  $result = mysqli_query($conn,$sql);
  foreach($result as $row) {
    $arr['id'] = $itemID;
    $arr['t'] = $row['produsNume'];
    $arr['p'] = $row['Price'];
    $arr['DT'] = $row['DrinkType'];
  }
  return $arr;
}
function mainObj($currentID, $conn){
  $sql = "SELECT * FROM Prod WHERE `ID`= {$currentID}";
  $result = mysqli_query($conn,$sql);
  foreach($result as $row) {
    $obj['user'] = $row['Nume_prenume'];
    $obj['src'] = $row['img1'];
    $obj['country'] = $row['country'];
    $obj['Mun'] = $row['Mun'];
    $obj['oras'] = $row['Oras'];
    $obj['Drink'] = $row["Drink"];
    $obj['DT'] = $row['DrinkType'];
    $obj['used'] = $row['Used'];
    $obj['year'] = $row['year'];
    $obj['MI'] = $row['MadeIn'];
    $obj['BI'] = $row['BoughtIn'];
    $obj['det'] = $row['Details'];
    $obj['price'] = $row['Price'];
    $obj['Ex'] = $row['Exhange'];
    $obj['Nr'] = $row['PhoneNr'];
    //echo $row['ID'];
    //echo "<br>";
    //echo print_r($row);       // Print the entire row data
    //echo "<br>";
  }
  return $obj;
}

?>

