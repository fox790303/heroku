<?php 
class MulticastMessage {
    
    private static $api = 'https://api.line.me/v2/bot/message/multicast';
    
    public static function doTest($evt, $token, $secret)
    {
        $replyToken = $evt->replyToken;
        $type = $evt->type;
        $timestamp = $evt->timestamp;
        $source = $evt->source;
        $message = $evt->message;
        
        $obj['to'] = array($source->userId);
        $obj['messages'] = array();
        $obj['messages'][] = array('type' => 'text', 'text' => 'multi 1');
        $obj['messages'][] = array('type' => 'text', 'text' => 'multi 2');
        $json = json_encode($obj);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$api);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json","Authorization: Bearer {$token}"));
        $output = curl_exec($ch);
        curl_close($ch);
        
        return $json. " |".$output;
    }
}
?>