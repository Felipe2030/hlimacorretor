<?php
$backgroundSource = isset($_GET['url_image']) ? $_GET['url_image'] : false;

if(!$backgroundSource): 
    exit();
endif;

$png  = imagecreatefrompng("./../assets/img/out.png");
$jpeg = imagecreatefromjpeg($backgroundSource);
$percent = 1;

$width  = imagesx($jpeg);
$height = imagesy($jpeg);
$new_width  = 720 * $percent;
$new_height = 540 * $percent;

$saida = imagecreatetruecolor($new_width,$new_height);
imagecopyresized($saida,$jpeg, 0, 0, 0, 0,$new_width,$new_height,$width,$height);

imagecolortransparent($png,null);
imagealphablending($png,false);
imagesavealpha($png,true);
imagecopy($saida, $png, 340, 380, 0, 0, imagesx($png),imagesy($png));

header('Content-type: image/png');
imagepng($saida);
imagedestroy($saida);

?>