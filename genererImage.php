<?php
    header("Content-type: image/jpeg");
    //$idCD = $_GET['idCD'];
    //$pochette = $cdList[0]->getElementsByTagName("pochette")->item(0)->nodeValue;
    //$im = imagecreatefromjpeg("images/dark_side_of_the_moon.jpg");
    $im = imagecreatefromjpeg($cdList[0]->getElementsByTagName("pochette")->item(0)->nodeValue);
    
    //imagescale($im,200,200);
    imagejpeg($im);
    imagedestroy($im);
?>