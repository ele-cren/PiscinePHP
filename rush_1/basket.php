<form class="form" action="check_items.php" method="post">
				<tr>
					<td><input style="text-align: center;" class="INPUT-form" type="text" name="name" disabled="disabled" value="<?php echo $key; ?>"/></td>
					<input type="hidden" name="article_name" value="<?php echo $key; ?>" />
					<td><input style="text-align: center;" class="INPUT-form" type="number" name="prix" disabled="disabled" value="<?php echo $elem['price'] ?>"/></td>
					<td colspan="1"><input type="submit" name="del" value="Enlever un item du panier"/></td>
					<td colspan="1"><input type="submit" name="add" value="Ajouter un item au panier"/></td>
					<td><input style="text-align: center;" class="INPUT-form" type="number" name="quant" value="<?php echo $elem['quant']; ?>" disabled="disabled"/></td>
					<td><input style="text-align: center;" class="INPUT-form" type="numer" name="price" value="<?php echo $elem['quant'] * $elem['price']; ?>" disabled="disabled"/></td>
				</tr>
</form>
