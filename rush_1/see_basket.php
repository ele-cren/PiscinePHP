<?php
	session_start();
	Include "head.php";
?>
<center>
	<br />
			<td><a href="index.php"><input style="text-align: center;" class="INPUT-form" type="text" name="Deco" value="Retour accueil" disabled="disabled"/></a></td>
</center>

<body style="background-color: #F8971C">
<center>
	<div class="form">
		<br />
		<font class="form-css">
			<table>
								<!-- NEW = A mettre dans see_basket, juste en dessous de <table> -->
				<tr>
					<th colspan="6">SOMME TOTALE (€)</th>
				</tr>
				<tr>
					<th colspan="6"><input style="text-align: center; width: 100%;" class="INPUT-form" type="text" name="total" value="<?php echo $_SESSION['PRICE_BASK']." €"; ?>" disabled="disabled"/></th>
				</tr>
				<!-- FIN - NEW -->
				<tr>
					<th colspan="2">ARTICLE</th>
					<th colspan="2">Gestion Quantité</th>
					<th colspan="2">Panier</th>
				</tr>
				<tr>
					<th colspan="1">NOM</th>
					<th colspan="1">PRIX (€)</th>
					<th>-</th>
					<th>+</th>
					<th>Quantite</th>
					<th>PRIX €</th>
				</tr>
				<?php
					if (isset($_SESSION['basket'])){
					foreach ($_SESSION['basket'] as $key => $elem){
							Include "basket.php";
						}
					}
				?>
			</table>
			<br />
		</div>
	<form class="form" action="valid_basket.php" method="post">
				<br />
				<tr>
					<?php
						if ($_SESSION['logged_on_user'] != "")
							echo "<td colspan=\"2\"><input type=\"submit\" name=\"valid_basket\" value=\"Valider le panier\"/></td>";
						else
							echo "<font style=\"color: White\";\">Veuillez vous connecter à l acceuil pour valider votre commande.";
					?>
				<br />
				</tr>
		<br />
	</form>
		</center>
</body>
