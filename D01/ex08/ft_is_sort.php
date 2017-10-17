<?php
function ft_is_sort($array)
{
	if ($array)
	{
		$cmp = $array;
		sort($array);
		if (!array_diff_assoc($cmp, $array))
			return true;
		else
			return false;
	}
	else
		return true;
}
?>
