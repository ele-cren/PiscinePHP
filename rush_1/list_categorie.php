<?php
	session_start();
?>
<form class="form" action="manage_categories.php" method="post">
<tr>
	<th colspan="3"><input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="name" value="<?php echo $data['name']; ?>" disabled="disabled"/></th>
	<input type="hidden" name="name_cate"" value="<?php echo $data['name']; ?>" />
	<th><input style="text-align: center;color: RED;width: 20vmin;" class="INPUT-form" type="submit" name="del" value="Suppression"/></th>
</tr>
</form>
