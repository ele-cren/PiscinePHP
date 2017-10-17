<?php
	session_start();
?>

<br />
<center>
	<form class="form" action="create.php" method="post">
		<br />
		<font class="form-css">
			<table>
				<tr>
					<th colspan="2"><?php echo $_SESSION['logged_on_user']; ?></th>
					<th colspan="2"><a href="see_basket.php" style="text-decoration: none; color: RED">Voir mon PANIER</a></th>
				</tr>
				<tr>
					<th>Deconnection</th>
					<th>Delete</th>
					<th>Nbr de produit</th>
					<th>PRIX €</th>
				</tr>
				<tr>
					<td style="background-color: RED"><a style="text-decoration: none;" href="deco.php" title="Deconnection"><input style="text-align: center;background-color: RED" class="INPUT-form" type="text" name="Deco" value="Deconnection" disabled="disabled"/></a></td>
					<td style="background-color: RED"><a style="text-decoration: none;" href="delete.php" title="Delete"><input style="text-align: center;background-color: RED" class="INPUT-form" type="text" name="Deco" value="Suppression" disabled="disabled"/></a></td>
					<td><input style="text-align: center;" class="INPUT-form" type="number" name="passwd" value="<?php echo $_SESSION['QUANT_BASK']; ?>" disabled="disabled"/></td>
					<td><input style="text-align: center;" class="INPUT-form" type="number" name="passwd" value="<?php echo $_SESSION['PRICE_BASK']; ?>" disabled="disabled"/></td>
				</tr>
			</table>
			<br />
		</form>
</center>

<?php
Include "data_connect.php";
$id = 1;
$query = "SELECT login FROM members WHERE admin = ? AND login = ?";
$res_prep = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($res_prep, "is", $id, $_SESSION['logged_on_user']);
mysqli_stmt_execute($res_prep);
mysqli_stmt_store_result($res_prep);
if (mysqli_stmt_num_rows($res_prep) == 1){
		Include "dir_admin_page.php";
	}
?>
