#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');

function check_day($str)
{
	if ((strcmp($str, "Lundi") == 0) || 
		(strcmp($str, "Mardi") == 0) || 
		(strcmp($str, "Mercredi") == 0) || 
		(strcmp($str, "Jeudi") == 0) || 
		(strcmp($str, "Vendredi") == 0) || 
		(strcmp($str, "Samedi") == 0) || 
		(strcmp($str, "Dimanche") == 0))
		return (true);
	else
		return (false);
}

function ft_error()
{
	echo "Wrong Format\n";
	exit(1);
}

function check_daymonth($day, $month, $year)
{
	if ($month <= 7 && $month % 2 == 0)
		$reg = preg_match("/^([1-2]?[0-9]|30)$/", $day);
	elseif ($month <= 7 && $month % 2 != 0)
		$reg = preg_match("/^([1-2]?[0-9]|3[0-1])$/", $day);
	elseif ($month > 7 && $month % 2 == 0)
		$reg = preg_match("/^([1-2]?[0-9]|3[0-1])$/", $day);
	else
		$reg = preg_match("/^([1-2]?[0-9]|3[0-1])$/", $day);
	if ($month == 2 && $year % 4 == 0)
		$reg = preg_match("/^(1?[0-9]|2[0-9])$/", $day);
	elseif ($month == 2 && $year % 4 != 0)
		$reg = preg_match("/^(1?[0-9]|2[0-8])$/", $day);
	return ($reg);
}

function check_yearndate($year, $date)
{
	$yreg = preg_match("/[1-2]\d{3}/", $year);
	$dreg = preg_match("/^([0-1][0-9]|2[0-3])(:[0-5][0-9]){2}$/", $date);
	if (!$yreg || !$dreg)
		return (false);
	return (true);
}
if ($argc == 2){
$months = array(
	1 => "Janvier",
	2 => "Février",
	3 => "Mars",
	4 => "Avril",
	5 => "Mai",
	6 => "Juin",
	7 => "Juillet",
	8 => "Août",
	9 => "Septembre",
	10 => "Octobre",
	11 => "Novembre",
	12 => "Décembre");
$date = explode(" ", $argv[1]);
$month = array_search($date[2], $months);
if (count($date) != 5 || !check_day($date[0]) || !$month)
	ft_error();
if (!check_daymonth($date[1], $month, $date[3]))
	ft_error();
if (!check_yearndate($date[3], $date[4]))
	ft_error();
$time = explode(":", $date[4]);
echo mktime($time[0], $time[1], $time[2], $month, $date[1], $date[3]);
echo "\n";
}
?>
