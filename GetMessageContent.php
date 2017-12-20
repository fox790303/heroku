<?php 
require __DIR__ . '/vendor/autoload.php';

require_once './Logger.php';
$accessToken = "WKbusDT+cnQi8JxsfTTuIT13WlvCpcaQ1X3Ye0Rk3UEL6stWaCsdKAU3xF4MNyrUeeXx/Gi9KqH1M3gzQTkcGSRWHFsyTlURlQXLQOf7u3BfLtUN6zygSXGm/LWPUofb5fXMK8i3L5Yq4ZzMbiOD8Y9PbdgDzCFqoOLOYbqAITQ=";
$channelSecret = "f9fa44d9685ba1156830641eb411529e";
$channelId = "1545665346";
$log = new Logger('GetMessageContent');

$messageId = $_GET['messageId'];

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($accessToken);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$response = $bot->getMessageContent($messageId);
if ($response->isSucceeded()) {
    $log->info('RECEIVE |'.$response->getRawBody());
    echo $response->getRawBody();
} else {
    //error_log($response->getHTTPStatus() . ' ' . $response->getRawBody());
}
?>