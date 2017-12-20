<?php 
require __DIR__ . '/vendor/autoload.php';

require_once './Logger.php';
$accessToken = "WKbusDT+cnQi8JxsfTTuIT13WlvCpcaQ1X3Ye0Rk3UEL6stWaCsdKAU3xF4MNyrUeeXx/Gi9KqH1M3gzQTkcGSRWHFsyTlURlQXLQOf7u3BfLtUN6zygSXGm/LWPUofb5fXMK8i3L5Yq4ZzMbiOD8Y9PbdgDzCFqoOLOYbqAITQ=";
$channelSecret = "f9fa44d9685ba1156830641eb411529e";
$channelId = "1545665346";
$log = new Logger('Webhook');

$log->info('RECEIVE |'.file_get_contents("php://input"));
$postData = json_decode(file_get_contents("php://input"));
print_r($postData);

if( !empty($postData->events) ) {
    switch ($postData->events[0]->type) {
        case "message":
            //$response = ReplyMessage::doTest($postData->events[0], $accessToken, $channelSecret);
            //$response = PushMessage::doTest($postData->events[0], $accessToken, $channelSecret);
            $response = MulticastMessage::doTest($postData->events[0], $accessToken, $channelSecret);
            $log->info('RESPONSE |'.$response);
            break;
        case "follow":
            break;
        case "unfollow":
            break;
        case "join":
            break;
        case "leave":
            break;
        case "postback":
            break;
        case "beacon":
            break;
    }
}

?>