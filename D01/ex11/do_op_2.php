#!/usr/bin/php
<?php

function operator($str)
{
	if ($str == '+' || $str == '-' || $str == '*' || $str == '/' || $str == '%')
		return (true);
	else
		return (false);
}

function do_the_math($v1, $op, $v2)
{
	if ($op == "+")
		echo $v1 + $v2;
	elseif ($op == "-")
		echo $v1 - $v2;
	elseif ($op == "*")
		echo $v1 * $v2;
	elseif ($op == "/")
		echo $v1 / $v2;
	elseif ($op == "%")
		echo $v1 % $v2;
	echo "\n";
}

function err()
{
	echo "Syntax Error\n";
	exit(1);
}

if ($argc == 2 && $argv[1])
{
	$array = array_filter(explode(" ", $argv[1]));
	$str = implode($array);
	$ni = 0;
	while ($str[$i] && !operator($str[$i]))
		$v1[$ni++] = $str[$i++];
	$ni = 0;
	while (operator($str[$i]))
		$op[$ni++] = $str[$i++];
	$ni = 0;
	while ($str[$i] && !operator($str[$i]))
		$v2[$ni++] = $str[$i++];
	if ($v1 && $op && $v2)
	{
		$v1 = implode($v1);
		$op = implode($op);
		$v2 = implode($v2);
	}
	else
		err();
	if (is_numeric($v1) && operator($op) && is_numeric($v2))
		do_the_math($v1, $op, $v2);
	else
		err();
}
else
	echo "Incorrect parameters\n";
?>
