<?php
namespace think;

class Robot{
	public static function reply($appkey='', $userid='', $keyword = '' ){
		if(!$appkey||!$userid){
			return '不告诉我是哪个机器人吗？';
		}
        $url = 'http://openapi.tuling123.com/openapi/api/v2';
        $httph =curl_init($url);
        $json = ["reqType"=>0,
            "perception"=> [
                "inputText"=> [
                    "text"=> $keyword
                ]
            ],
            "userInfo"=> [
                "apiKey"=> $appkey,
                "userId"=> $userid
            ]];
        curl_setopt($httph, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($httph, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($httph,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($httph,CURLOPT_ENCODING,'gzip,deflate');
        curl_setopt($httph, CURLOPT_POST, 1);//设置为POST方式
        curl_setopt($httph, CURLOPT_POSTFIELDS, json_encode($json));
        $result=curl_exec($httph);
        curl_close($httph);
        $anwser;
        $result = json_decode($result,true)['results'];
        foreach($result as $item){
            if($item['resultType'] === 'text'){
                $anwser = $item['values']['text'];
            }
        }
        var_dump($anwser);
        foreach($result as $item){
            if($result&&$item['resultType'] === 'url'){
                $url = "<a href=";
                $url .= "'".$item['values']['url']."'";
                $url .= ">$anwser</a>";
                $anwser = $url;
            }
        }
        return $anwser;
    }
}
?>