<?php
	session_start();
?>
<tr>
	<th>
		<input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="ID" value="<?php echo $data['order_id']; ?>" disabled="disabled"/>
	</th>
	<th colspan="1">
		<input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="login_client" value="<?php echo $data['user']; ?>" disabled="disabled"/>
	</th>
	<th colspan="1">
		<input style="text-align: center;width: 20vmin;" class="INPUT-form" type="number" name="quantity" value="<?php echo $data['quant']; ?>" disabled="disabled"/>
	</th>
	<th colspan="1">
		<input style="text-align: center;width: 20vmin;" class="INPUT-form" type="number" name="price" value="<?php echo $data['price']; ?>" disabled="disabled"/>
	</th>
</tr>
