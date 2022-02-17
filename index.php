<?php
   $token = "https://api.telegram.org/bot5224778305:AAF6INif-5hT8WgcjTtaUAdIh63iItyPDcA";
   $update = json_decode(file_get_contents("php://input"), TRUE);

   $chatId = $update["message"]["chat"]["id"];
   $message = $update["message"]["text"];

   if (strpos($message, "/start") === 0) {
      file_get_contents($token."/sendMessage?chat_id=".$chatId."&text=Bienvenido");
   }
   
   if (strpos($message, "/stream") === 0) {
      file_get_contents($token."/sendMessage?chat_id=".$chatId."&text=www.twitch.tv/pichon_alegre");
   }
   
   if (strpos($message, "/tiempo") === 0) {
      $location = substr($message, 8);
      $weather1 = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["weather"][0]["main"];
      $weather2 = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["weather"][0]["description"];
      $weather3 = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["wind"]["speed"];
      file_get_contents($token."/sendmessage?chat_id=".$chatId."&text=Este es el tiempo en ".$location.": ". $weather1);
      file_get_contents($token."/sendmessage?chat_id=".$chatId."&text=Descripcion: ". $weather2);
      file_get_contents($token."/sendmessage?chat_id=".$chatId."&text=Velocidad: ". $weather3);
   }

   if (strpos($message, "/news") === 0) {
      $item = substr($message, 8);
      $news = json_decode(file_get_contents("http://api.mediastack.com/v1/news?access_key=85b7a0cec862c55c0bd53253323aef03"), TRUE)["data"]["title"];
      file_get_contents($token."/sendmessage?chat_id=".$chatId."&text=noticias: ". $news);
   }

?> 