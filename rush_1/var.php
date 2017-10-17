<?php

session_start();
include "data_connect.php";

$query = "SELECT login FROM members WHERE login = 'admin'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) == 0){
    $query = "INSERT INTO members(LOGIN, PASS, ADMIN) VALUES('admin', 'admin', 1)";
    $result = mysqli_query($db, $query);
}

if (!isset($_SESSION['logged_on_user']))
  $_SESSION['logged_on_user'] = "";

if (!isset($_SESSION['EXIST']))
  $_SESSION['EXIST'] = 0;

if (!isset($_SESSION['QUANT_BASK']))
  $_SESSION['QUANT_BASK'] = 0;

if (!isset($_SESSION['PRICE_BASK']))
  $_SESSION['PRICE_BASK'] = 0;

if (!isset($_SESSION['BASKET']))
  $_SESSION['BASKET'] = array();
?>
