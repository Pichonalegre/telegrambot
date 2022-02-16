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
      $weather = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/forecast?id=6357751&hourly?lat=36.976369&lon=-3.540951&&appid=5cf939c3ecb138f202af77717ecbe12e"), TRUE)["weather"][0]["main"];
      file_get_contents($token."/sendmessage?chat_id=".$chatId."&text=Este es el tiempo en ".$location.": ". $weather);
   }
?> 