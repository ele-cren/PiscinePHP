#!/usr/bin/php
<?php
if ($argc > 1){
	$rep = trim(preg_replace('/(\t| )+/', ' ', $argv[1]));
	echo "$rep\n";
}
?>
