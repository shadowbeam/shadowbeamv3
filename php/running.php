
<?php


error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'nikeplusphp.4.5.1.php';
$n = new NikePlusPHP('a.watson91@btinternet.com', 'usp5libV');


$mostRecentActivity = $n->mostRecentActivity();
$coords = $mostRecentActivity->activity->geo;

echo json_encode($coords);

?>