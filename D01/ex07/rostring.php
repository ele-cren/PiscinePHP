#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$ros = array_filter(explode(" ", $argv[1]));
		$i = 1;
		while ($ros[$i])
		{
			echo $ros[$i++];
			echo " ";
		}
		echo $ros[0];
		if ($ros)
			echo "\n";
	}
?>
