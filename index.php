<?php
   $token = "https://api.telegram.org/bot5224778305:AAF6INif-5hT8WgcjTtaUAdIh63iItyPDcA";
   $update = json_decode(file_get_contents("php://input"), TRUE);

   $chatId = $update["message"]["chat"]["id"];
   $message = $update["message"]["text"];

   if (strpos($message, "/start") === 0) {
      file_get_contents($token."/sendMessage?chat_id=".$chatId."&text=Bienvenid@!" );
      file_get_contents($token."/sendMessage?chat_id=".$chatId."&text=Comandos:");
      file_get_contents($token."/sendMessage?chat_id=".$chatId."&text=Comandos:");
      file_get_contents($token."/sendMessage?chat_id=".$chatId."&text=/Stream Visita mis streams en twitch");
      file_get_contents($token."/sendMessage?chat_id=".$chatId."&text=/tiempo \"localizacion\" consulta el tiempo");
      file_get_contents($token."/sendMessage?chat_id=".$chatId."&text=/tarkov \"item\" Consulta el precio del item introducido en el juego Tarkov");
   }
   
   if (strpos($message, "/stream") === 0) {
      file_get_contents($token."/sendMessage?chat_id=".$chatId."&text=www.twitch.tv/pichon_alegre");
   }
   
   if (strpos($message, "/tiempo") === 0) {
      $location = substr($message, 8);
      $weather1 = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&lang=es&units=metric&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["weather"][0]["main"];
      $weather2 = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&lang=es&units=metric&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["weather"][0]["description"];
      $weather3 = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&lang=es&units=metric&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["wind"]["speed"];
      $weather4 = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&lang=es&units=metric&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["main"]["temp_max"];
      $weather5 = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&lang=es&units=metric&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["main"]["temp_min"];
      file_get_contents($token."/sendmessage?chat_id=".$chatId."&text=Este es el tiempo en ".$location.": ". $weather1);
      file_get_contents($token."/sendmessage?chat_id=".$chatId."&text=Descripción: ". $weather2);
      file_get_contents($token."/sendmessage?chat_id=".$chatId."&text=Velocidad: ". $weather3."Km/h");
      file_get_contents($token."/sendmessage?chat_id=".$chatId."&text=temperatura maxima: ". $weather4."º");
      file_get_contents($token."/sendmessage?chat_id=".$chatId."&text=temperatura minima: ". $weather5."º");
   }

   if (strpos($message, "/news") === 0) {
      $item = substr($message, 8);
      /*$news = json_decode(file_get_contents("http://api.mediastack.com/v1/news?access_key=85b7a0cec862c55c0bd53253323aef03");
      for ($i=0; $i < 5; $i++) { 
         $news = json_decode(file_get_contents("http://api.mediastack.com/v1/news?access_key=85b7a0cec862c55c0bd53253323aef03"), TRUE)["data"][$i]["url"];
         file_get_contents($token."/sendmessage?chat_id=".$chatId."&text=noticias: ". $news);
      } */     

   }

?> 