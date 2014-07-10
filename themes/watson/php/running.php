
<?php


error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'nikeplusphp.4.5.1.php';
$n = new NikePlusPHP('a.watson91@btinternet.com', 'usp5libV');


$mostRecentActivity = $n->mostRecentActivity();
//var_dump($mostRecentActivity);

$coords = $mostRecentActivity->activity->geo;

$coords->avgPace = $n->calculatePace($mostRecentActivity->activity->duration, $mostRecentActivity->activity->distance);
$coords->duration = $n->formatDuration($mostRecentActivity->activity->duration);
$coords->distance = $mostRecentActivity->activity->distance;
$date = new DateTime($mostRecentActivity->activity->startTimeUtc);
$coords->date = $date->format('jS F Y \a\t g:i a');

echo json_encode($coords);

?>