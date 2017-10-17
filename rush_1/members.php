<?php

session_start();

include "data_connect.php";

function member_exists($login){
  include "data_connect.php";
  $query = "SELECT login FROM members WHERE login = '{$login}'";
  $result = mysqli_query($db, $query);
  if (mysqli_num_rows($result) >= 1){
    return TRUE;
  }
  else {
    return FALSE;
  }
}


if ($_POST['inscription'] === "INSCRIPTION"){
  if ($_POST['login_cr'] && $_POST['passwd_cr']){
    if (member_exists($_POST['login_cr']) == FALSE){
      if (strlen($_POST['passwd_cr']) >= 3 && strlen($_POST['passwd_cr'] <= 12)){
        $_SESSION['logged_on_user'] = $_POST['login_cr'];
        $passwd = hash("whirlpool", $_POST['passwd_cr']);
        $query = "INSERT INTO members(login, pass, admin) VALUES('{$_POST['login_cr']}', '{$passwd}', 0)";
        $result = mysqli_query($db, $query);
      }
      else {
        $_SESSION['loggeed_on_user'] = "";
        $_SESSION['EXIST'] = 3;
      }
    }
    else {
      $_SESSION['loggeed_on_user'] = "";
      $_SESSION['EXIST'] = 1;
    }
  }
  else {
    $_SESSION['EXIST'] = 3;
  }
}

elseif ($_POST['connexion'] === "CONNEXION"){
  include "connect_member.php";
}

else{
  $_SESSION['EXIST'] = 2;
}

header("Location: index.php");

?>
