<?php 
class ReplyMessage {
    
    public static function doTest($evt, $token, $secret)
    {
        $replyToken = $evt->replyToken;
        $type = $evt->type;
        $timestamp = $evt->timestamp;
        $source = $evt->source;
        $message = $evt->message;
        
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($token);
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $secret]);
        
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
        $response = $bot->replyMessage($replyToken, $textMessageBuilder);
        
        echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, self::$api);
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
//         $output = curl_exec($ch);
//         curl_close($ch);
//         echo curl_error($ch);
//         echo $output;
    }
}
?>