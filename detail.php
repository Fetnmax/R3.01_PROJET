<?php
    $idCD = $_GET['idCD'];
    
    $catalogue = new DOMDocument();
    $testXML = file_get_contents("CD.xml");
    $catalogue->loadXML($testXML);

    $cdList = $catalogue->getElementsByTagName("cd");

    $titre = $cdList[$idCD]->getElementsByTagName("titre")->item(0)->nodeValue;
    $artiste = $cdList[$idCD]->getElementsByTagName("artiste")->item(0)->nodeValue;
    $pochette = $cdList[$idCD]->getElementsByTagName("pochette")->item(0)->nodeValue;
    $genre = $cdList[$idCD]->getElementsByTagName("genre")->item(0)->nodeValue;
    $prix = $cdList[$idCD]->getElementsByTagName("prix")->item(0)->nodeValue;
    echo '<!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>'.$titre.'</title>
                <link rel="stylesheet" href="projet.css">
            </head>
            <body>';
    echo "<h2>$titre</h2>";
    echo "<img src='$pochette' alt='$titre'>";
    echo "<p>Artiste: $artiste</p>";
    echo "<p>Genre: $genre</p>";
    echo "<p>Prix: $prix €</p>";
?>