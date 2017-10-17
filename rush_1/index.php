<?php
 	session_start();

  include "var.php";
  include "data_connect.php";
?>
<!DOCTYPE html>
<html>
<?php Include "head.php"; ?>
<body style="background-color: #F8971C">

<!-- si pas connecte -->
<?php
	if ($_SESSION['logged_on_user'] === "")
	{
		Include "log.php";
		if ($_SESSION['EXIST'] == 2)
		{
			Include "connection_fail.php";
		}
		if ($_SESSION['EXIST'] == 3)
		{
			Include "subscription_fail.php";
		}
    elseif ($_SESSION['EXIST'] == 1)
      include ("member_exist.php");
	}
	else
	{
		Include "logged.php";
	}
	// Include "basket.php";
?>


<!-- <center> -->

<?php
$query = "SELECT category_id, name FROM categories";
$result = mysqli_query($db, $query);
while ($data = mysqli_fetch_assoc($result))
{
	Include"print_cate.php";
}
?>

</body>
</html>

</body>
</html>
