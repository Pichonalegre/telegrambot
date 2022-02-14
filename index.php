<?php
   $path = "https://api.telegram.org/bot5224778305:AAF6INif-5hT8WgcjTtaUAdIh63iItyPDcA";
   $update = json_decode(file_get_contents("php://input"), TRUE);

   $chatId = $update["message"]["chat"]["id"];
   $message = $update["message"]["text"];

   if (strpos($message, "/start") === 0) {

     file_get_contents($path."/sendMessage?chat_id=".$chatId."&text=Bienvenido");
   }
    
   if (strpos($message, "/tiempo") === 0) {
     $location = substr($message, 8);
     $weather = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=mytoken"), TRUE)["weather"][0]["main"];
     file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the weather in ".$location.": ". $weather);
   }
?> 