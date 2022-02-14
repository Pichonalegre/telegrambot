<?php
   $token = "https://api.telegram.org/bot5224778305:AAF6INif-5hT8WgcjTtaUAdIh63iItyPDcA";
   $update = json_decode(file_get_contents("php://input"), TRUE);

   $chatId = $update["message"]["chat"]["id"];
   $message = $update["message"]["text"];

   if (strpos($message, "/start") === 0) {

      file_get_contents($token."/sendMessage?chat_id=".$chatId."&text=Bienvenido");
      $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([['/go', '/status']], null, true);
 
      $message->getChat()->getId(), false, null, null, $keyboards;
      });
   }
    
   if (strpos($message, "/weather") === 0) {
      $location = substr($message, 9);
      $weather = json_decode(file_get_contents("api.openweathermap.org/data/2.5/weather?lat={lat}&lon={lon}&appid={API key}"), TRUE)["weather"][0]["main"];
      file_get_contents($token."/sendmessage?chat_id=".$chatId."&text=Este es el tiempo en ".$location.": ". $weather);
   }
?> 