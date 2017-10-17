<?php
	session_start();
?>
<center>
	<div class="form">
		<br />
		<font class="form-css">
			<table>
				<tr>
					<th colspan="5" style="width: 600px">Produits - Catégorie <?php echo $data['name']; ?></th>
				</tr>
				<tr>
					<th>NOM</th>
					<th colspan="1">Catégorie</th>
					<th colspan="1">PRIX</th>
					<th colspan="1">IMG</th>
					<th style="width: 150px">AJOUTER</th>
				</tr>
					<?php
						$query2 = "SELECT name, price, img from products p INNER JOIN product_categories pc
							ON p.product_id = pc.product_id WHERE pc.category_id = ?";
						$res_prep = mysqli_prepare($db, $query2);
						mysqli_stmt_bind_param($res_prep, "i", $data['category_id']);
						mysqli_stmt_execute($res_prep);
						mysqli_stmt_bind_result($res_prep, $data2['name'], $data2['price'], $data2['img']);
						while (mysqli_stmt_fetch($res_prep))
						{ ?>
							<?php Include "add_product_to_basket.php"; ?>
						<?php }
						?>
			</table>
		</font>
		<br>
	</div>
</center>
