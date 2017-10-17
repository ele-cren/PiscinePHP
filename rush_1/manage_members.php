<?php

Include "data_connect.php";

if ($_POST['add'] == "Ajouter" && $_POST['add_name_member'] &&
  $_POST['add_pass_member'] &&
    $_POST['bool_admin'] >= 0 && $_POST['bool_admin'] <= 1){
      $query = "INSERT INTO members(login, pass, admin) VALUES(?, ?, ?)";
      $res_prep = mysqli_prepare($db, $query);
      $passwd = hash("whirlpool", $_POST['add_pass_member']);
      mysqli_stmt_bind_param($res_prep, "ssi", $_POST['add_name_member'], $passwd, $_POST['bool_admin']);
      mysqli_stmt_execute($res_prep);

}

elseif($_POST['del'] == "Suppression"){
  echo $POST['login'];
  $query = "DELETE FROM members WHERE login = ?";
  $res_prep = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($res_prep, "s", $_POST['login']);
  mysqli_stmt_execute($res_prep);
}
header("Location: admin.php");
?>
