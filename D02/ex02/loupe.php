#!/usr/bin/php
<?php

function intoa($matches){
	$str = implode($matches);
	$str = preg_replace("/(?<=title=\")(.*)(?=\")/e", 'strtoupper("$0")', $str);
	$str = preg_replace("/(?<=>)(.*?)(?=<)/e", 'strtoupper("$0")', $str);
	return $str;
}

if (file_exists($argv[1])){
	$str = file_get_contents($argv[1]);
	$str = preg_replace_callback("/<a.*<\/a>/", "intoa", $str);
	echo "$str";
}
?>
