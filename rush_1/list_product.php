<?php
	session_start();
?>
<form class="form" action="manage_products.php" method="post">
<tr>
	<th>
		<input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="name" value="<?php echo $data['name']; ?>" disabled="disabled"/>
		<input type="hidden" name="name_prod" value="<?php echo $data['name']; ?>" />
	</th>
	<th colspan="1">
		<input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="name_cate" value="<?php echo $data['main_cat']; ?>" disabled="disabled"/>
	</th>
	<th colspan="1">
		<input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="price" value="<?php echo $data['price']; ?>" disabled="disabled"/>
	</th>
	<th colspan="1">
		<input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="path" value="<?php echo $data['img']; ?>" disabled="disabled"/>
	</th>
	<th>
		<input style="text-align: center;color: RED;width: 20vmin;" class="INPUT-form" type="submit" name="del" value="Suppression"/>
	</th>
</tr>
</form>
