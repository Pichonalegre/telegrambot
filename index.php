<?php
   $token = "https://api.telegram.org/bot5224778305:AAF6INif-5hT8WgcjTtaUAdIh63iItyPDcA";
   $update = json_decode(file_get_contents("php://input"), TRUE);

   $chatId = $update["message"]["chat"]["id"];
   $message = $update["message"]["text"];

   if (strpos($message, "/start") === 0) {

      file_get_contents($token."/sendMessage?chat_id=".$chatId."&text=Bienvenido");
      /*$keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([['/go', '/status']], null, true);
 
      $bot->sendMessage($message->getChat()->getId(), $message, false, null, null, $keyboards);
      });*/
   }
   if (strpos($message, "/stream") === 0) {

      file_get_contents($token."/sendMessage?chat_id=".$chatId."&text=www.twitch.tv/pichon_alegre");
   }
    
   if (strpos($message, "/tiempo") === 0) {
      $location = substr($message, 8);
      $weather = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=35&lon=139&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["weather"][0]["main"];
      file_get_contents($token."/sendmessage?chat_id=".$chatId."&text=Este es el tiempo en ".$location.": ". $weather);
   }
?> 