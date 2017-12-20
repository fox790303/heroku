<?php 

require_once './Logger.php';

$log = new Logger('Webhook');

$log->info(file_get_contents("php://input"));

?>