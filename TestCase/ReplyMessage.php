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
        
        return $response->getHTTPStatus() . ' |' . $response->getRawBody();
    }
}
?>