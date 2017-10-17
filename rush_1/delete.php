<?php

session_start();

include ("data_connect.php");

$query = "DELETE FROM members WHERE login = ?";
$res_prep = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($res_prep, "s", $_SESSION['logged_on_user']);
mysqli_stmt_execute($res_prep);

session_destroy();

header("Location: index.php");

?>
