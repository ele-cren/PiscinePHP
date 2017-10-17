<?php
	session_start();
?>
<form action="add_product.php" method="post">
<tr>
	<th>
		<input style="text-align: center;width: 20vmin;border-style: inset;" class="INPUT-form" type="text" name="name" value="<?php echo $data2['name']; ?>" disabled="disabled"/>
	</th>
	<th colspan="1">
		<input style="text-align: center;width: 20vmin;border-style: inset;" class="INPUT-form" type="text" name="category" value="<?php echo $data['name']; ?>" disabled="disabled"/>
	</th>
	<th colspan="1">
		<input style="text-align: center;width: 20vmin;border-style: inset;" class="INPUT-form" type="text" name="price" value="<?php echo $data2['price'] . ' €'; ?>" disabled="disabled"/>
		<input type="hidden" name="product_price" value="<?php echo $data2['price']; ?>" />
	</th>
	<th colspan="1">
		<input style="text-align: center;width: 20vmin;border-style: inset;" class="INPUT-form" type="image" name="img" src="<?php echo $data2['img']; ?>" disabled="disabled"/>
	</th>
	<th>
		<input style="text-align: center;color: GREEN;width: 20vmin;border-style: outset;" class="INPUT-form" type="submit" name="add" value="AJOUTER"/>
		<input type="hidden" name="product_name" value="<?php echo $data2['name']; ?>" />
	</th>
</tr>
</form>
