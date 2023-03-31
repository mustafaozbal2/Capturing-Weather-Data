<?php
$istemci = curl_init();

curl_setopt($istemci, CURLOPT_URL, 'http://api.openweathermap.org/data/2.5/weather?q=hatay&mode=json&lang=tr&units=metric&appid=ae6119ed0b3ee2325320df9d430103b3');
curl_setopt($istemci, CURLOPT_RETURNTRANSFER, 1);

$ham_veri = curl_exec($istemci);
//echo $ham_veri;

$ham_veri1=json_decode($ham_veri);

$dizi= (array)$ham_veri1;
/*
//print_r($dizi);
print("<br><br>");
var_dump($dizi['main']);
print("<br><br>");
var_dump($dizi['weather'][0]);
print("<br><br>");
var_dump($dizi['wind']);
print("<br><br>");
var_dump($dizi['coord']);
print("<br><br>");
var_dump($dizi['visibility']);
print("<br><br>");
var_dump($dizi['sys']);
*/
/*
print("<br>ID<br><br>");

$id=$dizi['weather'][0]->id;
print($id);

print("<br>ICON<br><br>");

$icon=$dizi['weather'][0]->icon;
print($icon);
*/
print("<br>Boylam<br><br>");

$lon=$dizi['coord']->lon;
print($lon);
print("<br>Enlem<br><br>");

$lat=$dizi['coord']->lat;
print($lat);
print("<br>En Az Sıcaklık <br><br>");

$temp_min=$dizi['main']->temp_min;
print($temp_min);
print("<br>NEM<br><br>");

$humidity=$dizi['main']->humidity;
print($humidity);
print("<br>Sıcaklık<br><br>");

$temp=$dizi['main']->temp;
print($temp);
print("<br>basınç<br><br>");

$pressure=$dizi['main']->pressure;
print($pressure);
print("<br>Hissedilen Sıcaklık<br><br>");

$feels_like=$dizi['main']->feels_like;
print($feels_like);
print("<br>En Çok Sıcaklık<br><br>");

$temp_max=$dizi['main']->temp_max;
print($temp_max);
print("<br>Tanım<br><br>");

$description=$dizi['weather'][0]->description;
print_r($description);
print("<br>Gün Doğumu<br><br>");

$sunrise=$dizi['sys']->sunrise;
print_r($sunrise);
print("<br>Gün Batımı<br><br>");

$sunset=$dizi['sys']->sunset;
print_r($sunset);
print("<br>Ülke<br><br>");
/*
$country=$dizi['sys']->country;
print_r($country);
*/

try{

$baglanti=new PDO("mysql:host=localhost;dbname=mustafa1343_yazi","mustafa1343_yazi","Qwe123???.");

echo "Mysql Bağlantısı Başarıyla Sağlandı. <br />";

$ekle=$baglanti->query("insert into  hava_durumu(temp_min,temp_max,humidity,temp,sunset,sunrise,description,feels_like,pressure,lat,lon,created_at,updated_at) values('$temp_min','$temp_max','$humidity','$temp','$sunset','$sunrise','$description','$feels_like','$pressure','$lat','$lon',now(),now())"); 

if($ekle){

	 echo "Başarıyla Eklendi.";

}else{

	echo "Eklenemedi.";

}



}catch (PDOException $h) {

$hata=$h->getMessage();

echo "<b>HATA VAR :</b> ".$hata;

}



?>