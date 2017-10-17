#!/usr/bin/php
<?php
if ($argc > 1)
{
	$total = array();
	$tmp = array();
	$i = 1;
	if ($argv[$i])
	{
		while ($i < $argc)
		{
			if ($argv[$i])
			{
				$tmp = array_filter(explode(' ', $argv[$i]));
				$total = array_merge($total, $tmp);
			}
			$i++;
		}
		if ($total)
			sort($total, SORT_NATURAL | SORT_FLAG_CASE);
		$i = 0;
		$i1 = 0;
		$i2 = 0;
		$i3 = 0;
		while ($total[$i])
		{
			if ((ord($total[$i]) >= 65 && ord($total[$i]) <= 90) || (ord($total[$i]) >= 97 && ord($total[$i]) <= 122))
				$s_a[$i1++] = $total[$i++];
			elseif ((ord($total[$i]) >= 48 && ord($total[$i]) <= 57))
				$s_n[$i2++] = $total[$i++];
			else
				$s_b[$i3++] = $total[$i++];
		}
		if ($s_n)
			sort($s_n, SORT_STRING);
		if ($s_b)
			sort($s_b);
		if ($s_n)
			$s_a = array_merge($s_a, $s_n);
		if ($s_b)
			$s_a = array_merge($s_a, $s_b);
		foreach ($s_a as $name)
			echo "$name\n";
	}
}
?>
