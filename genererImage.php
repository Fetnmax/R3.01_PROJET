<?php
    header("Content-type: image/jpeg");
    //$idCD = $_GET['idCD'];
    $pochette = $cdList[0]->getElementsByTagName("pochette")->item(0)->nodeValue;
    $im = imagecreatefromjpeg($pochette);
    //imagescale($im,200,200);
    imagejpeg($im);
    imagedestroy($im);
?>