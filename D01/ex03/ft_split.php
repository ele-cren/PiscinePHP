<?PHP
function ft_split($str)
{
	$array = array_filter(explode(" ", $str));
	if ($array != NULL)
		sort($array);
	return($array);
}
?>
