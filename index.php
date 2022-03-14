<?php
   $token = "https://api.telegram.org/bot5224778305:AAF6INif-5hT8WgcjTtaUAdIh63iItyPDcA";
   $update = json_decode(file_get_contents("php://input"), TRUE);
   $chatid = $update["message"]["chat"]["id"];
   $message = $update["message"]["text"];
   $contestacion = $update['message']['reply_to_message']['text'];



switch($message){
   case "/start":
      echo "hola";
      break;
   
}







   //START

/*

   if (strpos($message, "/start") === 0) {
      file_get_contents($token."/sendMessage?chat_id=".$chatid."&text=Bienvenid@!" );
      file_get_contents($token."/sendMessage?chat_id=".$chatid."&text=Comandos:");
      file_get_contents($token."/sendMessage?chat_id=".$chatid."&text=/stream Visita mis streams en twitch");
      file_get_contents($token."/sendMessage?chat_id=".$chatid."&text=/tiempo \"localizacion\" consulta el tiempo");
      file_get_contents($token."/sendMessage?chat_id=".$chatid."&text=/news Consulta de noticias");
   }
   */
   if (strpos($message, "/stream") === 0) {
      file_get_contents($token."/sendMessage?chat_id=".$chatid."&text=www.twitch.tv/pichon_alegre");
   }





   //TIEMPO







   if (strpos($message, "/tiempo") === 0) {
      $location = substr($message, 8);
      $respuesta="¿tiempo de que ciudad?";
      sendMessage($chatid, $respuesta, true);

   }

   if($contestacion=="¿tiempo de que ciudad?"){
       $location = $message;

      $localizacion=json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&lang=es&units=metric&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["name"];
      $weather1 = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&lang=es&units=metric&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["weather"][0]["main"];
      $weather2 = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&lang=es&units=metric&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["weather"][0]["description"];
      $weather3 = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&lang=es&units=metric&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["wind"]["speed"];
      $weather4 = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&lang=es&units=metric&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["main"]["temp_max"];
      $weather5 = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&lang=es&units=metric&appid=a32b06b98aa8fdc06e5902d229eb2055"), TRUE)["main"]["temp_min"];

      file_get_contents($token."/sendmessage?chat_id=".$chatid."&text=Este es el tiempo en ".$localizacion.": ". $weather1);
      file_get_contents($token."/sendmessage?chat_id=".$chatid."&text=Descripción: ". $weather2);
      file_get_contents($token."/sendmessage?chat_id=".$chatid."&text=Velocidad: ". $weather3."Km/h");
      file_get_contents($token."/sendmessage?chat_id=".$chatid."&text=temperatura maxima: ". $weather4."º");
      file_get_contents($token."/sendmessage?chat_id=".$chatid."&text=temperatura minima: ". $weather5."º");
   }



   //noticias


   if (strpos($message, "/news") === 0) {
      $item = substr($message, 8);
      for ($i=0; $i <10 ; $i++) { 
         $news = json_decode(file_get_contents("https://content.guardianapis.com/search?api-key=d07f7521-83d3-46be-af37-2b0831915a1c"), TRUE)["response"]["results"][$i]["webUrl"];
      file_get_contents($token."/sendmessage?chat_id=".$chatid."&text=". $news);
      }
   }

   function sendMessage($chatid, $response, $contestacion) {
      if($contestacion == TRUE) {
         $reply_mark = array('force_reply' => True);
         $url = $GLOBALS['token'].'/sendMessage?chat_id='.$chatid.'&parse_mode=HTML&reply_markup='.json_encode($reply_mark).'&text='.urlencode($response);
      }else $url = $GLOBALS['token'].'/sendMessage?chat_id='.$chatid.'&parse_mode=HTML&text='.urlencode($response);
    
      file_get_contents($url);
   }


?> 