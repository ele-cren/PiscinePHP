#!/usr/bin/php
<?php

function get_site($url){	
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, $url);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
	$str = curl_exec($c);
	curl_close($c);
	return $str;
}

function write2disk($dir, $image)
{
	$saveto = $dir . '/' . basename($image);
	$ch = curl_init($image);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
	$raw = curl_exec($ch);
	curl_close ($ch);
	$fd = fopen($saveto,'c');
	fwrite($fd, $raw);
	fclose($fd);
}

$dname = preg_replace('/.*?:\/\//', '', $argv[1]);
$url = get_site($argv[1]);
preg_match_all("/(?<=<img)(.*?)(?=>)/", $url, $images);
$url = implode($images[0]);
preg_match_all('/(?<=src=")(.*?)(?=")/', $url, $images);
if ($images[0])
{
	@mkdir($dname, 0755);
	foreach ($images[0] as $image)
		write2disk($dname, $image);
}
?>
