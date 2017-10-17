<?php

session_start();

if ($_POST['add'] == "AJOUTER"){
  $id = $_POST['product_name'];
  if (!isset($_SESSION['basket'][$id])){
    $_SESSION['basket'][$id] = array();
    $_SESSION['basket'][$id]['price'] = $_POST['product_price'];
    $_SESSION['basket'][$id]['quant'] = 1;
  }
  else {
    $_SESSION['basket'][$id]['quant'] += 1;
  }
  $_SESSION['QUANT_BASK'] += 1;
  $_SESSION['PRICE_BASK'] += $_POST['product_price'];

header("Location: index.php");
}
?>
