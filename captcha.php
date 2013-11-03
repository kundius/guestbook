<?php
// Подключаем генератор текста
include("random.php");
$captcha = generate_code();

$width = 150;                                //Ширина изображения
$height = 100;                                //Высота изображения
$font_size = 16;                           //Размер шрифта
$let_amount = 4;                        //Количество символов, которые нужно набрать
$fon_let_amount = 30;                //Количество символов на фоне
$font = "captcha/img/DroidSans.ttf";        //Путь к шрифту
 
//набор символов
$letters = $captcha;                
//цвета
$colors = array("90","110","130","150","170","190","210");        
 
$src = imagecreatetruecolor($width,$height);        //создаем изображение                                
$fon = imagecolorallocate($src,255,255,255);        //создаем фон
imagefill($src,0,0,$fon);                                                //заливаем изображение фоном
$color = imagecolorallocatealpha($src,$colors[rand(0,sizeof($colors)-1)],
   $colors[rand(0,sizeof($colors)-1)],
   $colors[rand(0,sizeof($colors)-1)],rand(20,40)); 
   $size = rand($font_size*2-2,$font_size*2+2);
   $x = $font_size + rand(1,5);                //даем каждому символу случайное смещение
   $y = (($height*2)/3) + rand(0,5);                                                        
   $cod[] = $captcha;                                                   //запоминаем код
   imagettftext($src,$size,rand(0,15),$x,$y,$color,$font,$captcha);
 
$cod = implode("",$cod);                                        //переводим код в строку
 
header ("Content-type: image/gif");                 //выводим готовую картинку
imagegif($src); 
?>
