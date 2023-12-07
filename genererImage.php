<?php
    header("Content-type: image/jpeg");
    $idCD = $_GET['idCD'];
    $catalogue = new DOMDocument();
    $testXML = file_get_contents("CD.xml");
    $catalogue->loadXML($testXML);

    $cdList = $catalogue->getElementsByTagName("cd");
    $pochette = $cdList[$idCD]->getElementsByTagName("pochette")->item(0)->nodeValue;
    $im = imagecreatefromjpeg($pochette);
    //imagescale($im,200,200);
    imagejpeg($im);
    imagedestroy($im);
?>