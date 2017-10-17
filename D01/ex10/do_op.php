#!/usr/bin/php
<?php
	function checks($a1, $a2, $a3)
	{
		if (!is_numeric($a1) || !is_numeric($a3))
			return false;
		if ($a2 != "+" && $a2 != "-" && $a2 != "*" && $a2 != "/" && $a2 != "%")
			return false;
		if (($a2 == "%" || $a2 == "/") && $a3 == "0")
			return false;
		return true;
	}
	if ($argc == 4)
	{
		$a1 = trim($argv[1]);
		$a2 = trim($argv[2]);
		$a3 = trim($argv[3]);
		if (!checks($a1, $a2, $a3))
			echo "Incorrect Parameters\n";
		else
		{
			if ($a2 == "+")
				echo $a1 + $a3;
			elseif ($a2 == "-")
				echo $a1 - $a3;
			elseif ($a2 == "*")
				echo $a1 * $a3;
			elseif ($a2 == "/")
				echo $a1 / $a3;
			elseif ($a2 == "%")
				echo $a1 % $a3;
			echo "\n";
		}
		$i = 0;
	}
	else
		echo "Incorrect Parameters\n";
?>
