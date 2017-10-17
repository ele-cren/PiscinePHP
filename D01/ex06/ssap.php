#!/usr/bin/php
<?php
if ($argc > 1){
	$i = 1;
	while ($argv[$i])
	{
		$tmp = array_filter(explode(' ', $argv[$i]));
		if ($i == 1)
			$total = $tmp;
		else
			$total = array_merge($total, $tmp);
		$i++;
	}
	if ($total)
		sort($total);
	$i = 0;
	while ($total[$i])
	{
		echo $total[$i++];
		echo "\n";
	}
}
?>
