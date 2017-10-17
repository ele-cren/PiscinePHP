#!/usr/bin/php
<?php
date_default_timezone_set("Europe/Paris");
$file = fopen("/var/run/utmpx", "r");
while ($utmp = fread($file, 628)){
	$unpacked = unpack("a256a/a4b/a32c/id/ie/I2f/a256g/i16h", $utmp);
	$array[$unpacked['c']] = $unpacked;
}
ksort($array);
foreach ($array as $entry){
	if ($entry['e'] == 7){
		echo $entry['a'];
		echo "\t";
		echo $entry['c'];
		echo "\t";
		echo date("M j H:i", $entry['f1']);
		echo "\n";
	}
}
?>
