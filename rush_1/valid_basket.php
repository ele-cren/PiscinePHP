<?php

session_start();

Include "data_connect.php";
if ($_SESSION['QUANT_BASK'] > 0){
  $query = "INSERT INTO orders(user, quant, price) VALUES(?, ?, ?)";
  $res_prep = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($res_prep, "sid", $_SESSION['logged_on_user'], $_SESSION['QUANT_BASK'], $_SESSION['PRICE_BASK']);
  mysqli_stmt_execute($res_prep);

  unset($_SESSION['basket']);
  $_SESSION['QUANT_BASK'] = 0;
  $_SESSION['PRICE_BASK'] = 0;
}
header("Location: index.php");
?>
