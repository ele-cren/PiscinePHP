<?php

session_start();

if ($_POST['add'] == "Ajouter un item au panier"){
  $_SESSION['basket'][$_POST['article_name']]['quant'] += 1;
  $_SESSION['PRICE_BASK'] += $_SESSION['basket'][$_POST['article_name']]['price'];
  $_SESSION['QUANT_BASK'] += 1;
}
elseif ($_POST['del'] == "Enlever un item du panier"){
  $_SESSION['basket'][$_POST['article_name']]['quant'] -= 1;
  $_SESSION['PRICE_BASK'] -= $_SESSION['basket'][$_POST['article_name']]['price'];
  $_SESSION['QUANT_BASK'] -= 1;
  if ($_SESSION['QUANT_BASK'] <= 0){
    $_SESSION['QUANT_BASK'] = 0;
  }
  if ($_SESSION['PRICE_BASK'] <= 0){
    $_SESSION['PRICE_BASK'] = 0;
  }
  if ($_SESSION['basket'][$_POST['article_name']]['quant'] <= 0){
    unset($_SESSION['basket'][$_POST['article_name']]);
  }
}

header("Location: see_basket.php");
?>
