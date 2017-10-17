#!/usr/bin/php
<?php
$i = $argc;
while ($i >= 2)
{
	if ($argv[$i])
	{
		$array = explode(":", $argv[$i]);
		if (strcmp($array[0], $argv[1]) == 0)
		{
			echo "$array[1]\n";
			break ;
		}
	}
	$i--;
}
?>
