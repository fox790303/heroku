<?php 

require_once './Logger.php';

$log = new Logger('Webhook');

$log->info(print_r($_GET, true));
$log->info(print_r($_POST, true));

?>