<?php
	session_start();
?>
<form class="form" action="manage_members.php" method="post">
<tr>
	<th colspan="2"><input style="text-align: center;width: 20vmin;" class="INPUT-form" type="text" name="log" value="<?php echo $data['login'] ?>" disabled="disabled"/></th>
	<input type="hidden" name="login" value="<?php echo $data['login'] ?>" />
	<th colspan="1"><input style="text-align: center;width: 20vmin;" class="INPUT-form" type="admin" name="pas" value="<?php echo $data['admin'] ?>" disabled="disabled"/></th>
	<th><input style="text-align: center;color: RED;width: 20vmin;" class="INPUT-form" type="submit" name="del" value="Suppression"/></th>
</tr>
</form>
