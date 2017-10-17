<?php
	session_start();

	// Si la variable logged_on_user n est pas admin, rediriger vers l index;
	Include "data_connect.php";
	$id = 1;
	$query = "SELECT login FROM members WHERE admin = ? AND login = ?";
	$res_prep = mysqli_prepare($db, $query);
	mysqli_stmt_bind_param($res_prep, "is", $id, $_SESSION['logged_on_user']);
	mysqli_stmt_execute($res_prep);
	mysqli_stmt_store_result($res_prep);
	if (mysqli_stmt_num_rows($res_prep) == 0)
		header("Location: index.php");
?>

<!DOCTYPE html>
<html>
	<?php Include "head.php" ?>
<body style="background-color: #F8971C">
	<br />
<center>
	<table>
		<tr>
			<td><p style="font-family: monospace;">Page Administration</p></td>
			<td><a href="index.php"><input style="text-align: center;" class="INPUT-form" type="text" name="Deco" value="Accueil" disabled="disabled"/></a></td>
		</tr>

<!-- PARTIE GESTION DE MEMBRE -->

<center>
</table>
		<div class="form">
		<br />
		<font class="form-css">
			<table>
				<tr>
					<th colspan="4" style="width: 600px">membres</th>
				</tr>
				<tr>
					<th>LOGIN</th>
					<th colspan="1">MDP</th>
					<th colspan="1">ADMIN</th>
					<th style="width: 150px">AJOUTER</th>
				</tr>
				<form method="post" action="manage_members.php">
				<tr>
				<th><input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="add_name_member"/></th>
				<th><input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="add_pass_member"/></th>
				<th colspan="1"><input style="text-align: center;width: 20vmin;" class="INPUT-form" type="number" name="bool_admin"/></th>
				<th><input style="text-align: center;color: GREEN;width: 20vmin;" class="INPUT-form" type="submit" name="add" value="Ajouter"/></th>
				</tr>
			</form>
				<tr>
					<th colspan="2" style="width: 50px">LOGIN</th>
					<th colspan="1" style="width: 50px">ADMIN</th>
 					<th style="width: 150px">DETRUIRE CLIENT</th>
				</tr>
					<?php
					Include "data_connect.php";
					$query = "SELECT login, admin FROM members WHERE login != ?";
					$res_prep = mysqli_prepare($db, $query);
					mysqli_stmt_bind_param($res_prep, "s", $_SESSION['logged_on_user']);
					mysqli_stmt_execute($res_prep);
					mysqli_stmt_bind_result($res_prep, $data['login'], $data['admin']);
					while (mysqli_stmt_fetch($res_prep)){
						Include "list_member.php";
					}
					?>
			</table>
		</font>
		<br>
	</div>





<!-- PARTIE GESTION DE PRODUIT -->

		<div class="form">
		<br />
		<font class="form-css">
			<table>
				<tr>
					<th colspan="5" style="width: 600px">Produits</th>
				</tr>
				<tr>
					<th>NOM</th>
					<th colspan="1">Catégorie</th>
					<th colspan="1">PRIX</th>
					<th colspan="1">IMG</th>
					<th style="width: 150px">AJOUTER</th>
				</tr>
					<form method="post" action="manage_products.php">
				<tr>
				<th><input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="name_prod"/></th>
				<th colspan="1"><input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="name_cate"/></th>
				<th colspan="1"><input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="prod_price"/></th>
				<th colspan="1"><input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="path"/></th>
				<th><input style="text-align: center;color: GREEN;width: 20vmin;" class="INPUT-form" type="submit" name="add" value="Ajouter"/></th>
				</tr>
					</form>
				<tr>
					<th style="width: 50px">NOM</th>
					<th colspan="1">Catégorie</th>
					<th colspan="1">PRIX</th>
					<th colspan="1">IMG</th>
					<!-- <th>ADMIN</th> -->
					<th style="width: 150px">DETRUIRE</th>
				</tr>
					<?php
					Include "data_connect.php";
					$query = "SELECT name, img, main_cat, price FROM products";
					$result = mysqli_query($db, $query);
					while ($data = mysqli_fetch_assoc($result)){
						Include "list_product.php";
					}
					?>
			</table>
		</font>
		<br>
	</div>


<!-- PARTIE GESTION DE CATEGORIE -->
	<div class="form">
		<br />
		<font class="form-css">
			<table>
				<tr>
					<th colspan="4" style="width: 600px">Catégorie</th>
				</tr>
				<tr>
					<th colspan="3">NOM</th>
					<th style="width: 150px">AJOUTER</th>
				</tr>
					<form method="post" action="manage_categories.php">
						<form class="form" action="manage_categories.php" method="post">
							<tr>
							<th colspan="3"><input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="name_cate"/></th>
							<th><input style="text-align: center;color: GREEN;width: 20vmin;" class="INPUT-form" type="submit" name="add" value="Ajouter"/></th>
							</tr>
					</form>
				<tr>
					<th colspan="3"> NOM</th>
					<!-- <th>ADMIN</th> -->
					<th style="width: 150px">DETRUIRE</th>
				</tr>
					<?php
					Include "data_connect.php";
					$query = "SELECT name FROM categories";
					$result = mysqli_query($db, $query);
					while ($data = mysqli_fetch_assoc($result)){
						Include "list_categorie.php";
					}
					?>
			</table>
		</font>
		<br>
	</div>

<form class="form" action="add_product.php" method="post">
	<br />
	<font class="form-css">
		<table>
			<tr>
				<th colspan="4" style="width: 600px">Commandes</th>
			</tr>
			<tr>
				<th colspan="1" =>ID</th>
				<th colspan="1">LOGIN CLIENT</th>
				<th colspan="1">NBR D ARTICLE</th>
				<th colspan="1">MONTANT</th>
			</tr>
				<?php
				Include "data_connect.php";
				$query = "SELECT order_id, user, quant, price FROM orders";
				$result = mysqli_query($db, $query);
				while ($data = mysqli_fetch_assoc($result)){
					Include "list_commands.php";
				}
				?>
		</table>
	</font>
	<br>
</form>


</font>
</center>
</body>
</html>
