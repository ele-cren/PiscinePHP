<?php

session_start();

session_destroy();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Install</title>
  </head>
  <body>
    <form method="get" action="install.php">
      <input type="submit" name="submit" value="install" />
    </form>
  </body>
</html>

<?php
if ($_GET['submit'] === "install"){
  include "sql_connect.php";
  include "data_delete.php";
  include "data_create.php";
  include "data_connect.php";
  include "tables_create.php";
}
?>
