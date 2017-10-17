<center>
	<form class="form" action="members.php" method="post">
		<br />
		<font class="form-css">
			<table>
				<tr>
					<th colspan="2">Deja membre</th>
					<th colspan="2">Incription</th>
					<th colspan="2"><a href="see_basket.php" style="text-decoration: none; color: RED">Voir mon PANIER</a></th>
				</tr>
				<tr>
					<th>Identifiant</th>
					<th>Mot de passe</th>
					<th>Identifiant</th>
					<th>Mot de passe</th>
					<th>Nbr de produit</th>
					<th>PRIX €</th>
				</tr>
				<tr>
					<td><input class="INPUT-form" type="text" name="login_co"/></td>
					<td><input class="INPUT-form" type="password" name="passwd_co"/></td>
					<td><input class="INPUT-form" type="text" name="login_cr"/></td>
					<td><input class="INPUT-form" type="password" name="passwd_cr"/></td>
					<td><input style="text-align: center;" class="INPUT-form" type="number" name="passwd" value="<?php echo $_SESSION['QUANT_BASK']; ?>" disabled="disabled"/></td>
					<td><input style="text-align: center;" class="INPUT-form" type="number" name="passwd" value="<?php echo $_SESSION['PRICE_BASK']; ?>" disabled="disabled"/></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="connexion" value="CONNEXION"/></td>
					<td colspan="2"><input type="submit" name="inscription" value="INSCRIPTION"/></td>
				</tr>
			</table>
		</form>
</center>
