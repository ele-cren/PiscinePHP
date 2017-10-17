#!/usr/bin/php
<?php

function get_index($key, $chaine)
{
	$i = 0;
	if (!$chaine)
		return (-1);
	while ($chaine[$i] != $key && $chaine[$i])
		$i++;
	if ($chaine[$i] != $key)
		return (-1);
	return ($i);
}

	$fname = $argv[1];
	$key = $argv[2];
	if (!$key || !$fname)
		exit(1);
	if (!file_exists($fname))
		exit(1);
	$fd = fopen($fname, "r");
	$total = array();
	$columns = explode(";", fgetcsv($fd)[0]);
	$index = get_index($key, $columns);
	if ($index == -1)
		exit(1);
	while ($array = fgetcsv($fd))
	{
		$str = implode($array);
		$tab = explode(";", $str);
		$i = 0;
		while ($columns[$i]) {
			${$columns[$i]}[$tab[$index]] = $tab[$i];
			$i++;
		}
	}
	$fd = fclose($fd);
	while (1)
	{
		echo "Entrez votre commande: ";
		$buf = fgets(STDIN);
		if (feof(STDIN))
		{
			echo "^D\n";
			break ;
		}
		eval($buf);
	}
?>
