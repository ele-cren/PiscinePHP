#!/usr/bin/php
<?php

function moyenne(){
	$i = 0;
	$total = 0;
	while ($array = fgetcsv(STDIN))
	{
		$exp = explode(";", $array[0]);
		if ($exp[0] != "User"){
			if ($exp[2] != "moulinette" && is_numeric($exp[1])){
				$total += $exp[1];
				$i++;
			}
		}
	}
	if ($i != 0){
		$total /= $i;
		echo "$total\n";
	}
}

function moyenne_user($mode){
	$i = 0;
	$total = 0;
	$full = array();
	$tmp = null;
	while ($array = fgetcsv(STDIN))
		$full = array_merge($full, $array);
	sort($full);
	unset ($full[0]);
	foreach ($full as $elem){
		$exp = explode(";", $elem);
		if ($exp[2] == "moulinette")
			$moul = $exp[1];
		if ($tmp == null)
			$tmp = $exp[0];
		if ($tmp != $exp[0] && $i != 0){
			$total /= $i;
			if ($mode == 2)
				$total = $total - $moul;
			if ($i != 0)
				echo "$tmp:$total\n";
			$total = 0;
			$i = 0;
			$tmp = $exp[0];
		}
		if ($exp[2] != "moulinette" && is_numeric($exp[1])){
			$i++;
			$total += $exp[1];
		}
	}
	if ($i != 0)
		$total /= $i;
	if ($mode == 2)
		$total = $total - $moul;
	if ($i != 0)
		echo "$tmp:$total\n";
}

if ($argc == 2){
	if ($argv[1] == "moyenne")
		moyenne();
	elseif ($argv[1] == "moyenne_user")
		moyenne_user(1);
	elseif ($argv[1] == "ecart_moulinette")
		moyenne_user(2);
}
?>
