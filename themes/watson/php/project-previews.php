<?php 

error_reporting(E_ALL);
ini_set("display_errors", 1);

$array = [];

$preview = new stdClass;
$preview->title = "";
$preview->url = "";
$preview->img = "";
$preview->description = "";
$preview->updated = "";

$dumbain = clone $preview;
$dumbain->title = "Dumbain Farm";
$dumbain->url = "http://www.dumbainfarm.co.uk";
$dumbain->img = "dumbain-farm";
$dumbain->description = "A simple bed and breakfast website built using GetSimple CMS.";
$dumbain->updated = "24/04/2014";

$garto = clone $preview;
$garto->title = "Gartocharn";
$garto->url = "http://www.gartocharn.org";
$garto->img = "gartocharn";
$garto->description = "A village community website built using Joomla.";
$garto->updated = "02/01/2014";

$csr = clone $preview;
$csr->title = "CSR";
$csr->url = "http://devweb2013.cis.strath.ac.uk/meng2013/";
$csr->img = "csr";
$csr->description = "Online Booking system built for Strathclyde Centre for Sports and Recreation as part of fifth year masters project.";
$csr->updated = "01/05/2014";

array_push($array, $dumbain, $garto, $csr);

// print_r($array);
echo json_encode($array);

?>