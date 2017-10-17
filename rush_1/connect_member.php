<?php

function pass_match($login, $passwd){
  if ($passwd != "admin")
    $passwd = hash("whirlpool", $passwd);
  include ("data_connect.php");
  $query = "SELECT login, pass FROM members WHERE login = ? AND pass = ?";
  $res_prep = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($res_prep, "ss", $login, $passwd);
  mysqli_stmt_execute($res_prep);
  mysqli_stmt_store_result($res_prep);
  if (mysqli_stmt_num_rows($res_prep) >= 1){
    return TRUE;
  }
  else {
    return FALSE;
  }
}

if ($_POST['login_co'] && $_POST['passwd_co']){
  if (pass_match($_POST['login_co'], $_POST['passwd_co']) == TRUE){
    $_SESSION['logged_on_user'] = $_POST['login_co'];
  }
  else {
    $_SESSION['EXIST'] = 2;
  }
}
else {
  $_SESSION['EXIST'] = 2;
}

?>
