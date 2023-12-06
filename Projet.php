<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page d'Album</title>
    <link rel="stylesheet" href="projet.css">
</head>
<?php
$catalogue = new DOMDocument();
$testXML = file_get_contents("CD.xml");
$catalogue->loadXML($testXML);

$cdList = $catalogue->getElementsByTagName("cd");

echo "<h1>Catalogue</h1>";
echo "<div class='mesAlbums'>";
// Parcourir chaque CD et afficher les informations
foreach ($cdList as $cd) {
    $titre = $cd->getElementsByTagName("titre")->item(0)->nodeValue;
    $artiste = $cd->getElementsByTagName("artiste")->item(0)->nodeValue;
    $pochette = $cd->getElementsByTagName("pochette")->item(0)->nodeValue;

    // Affichage des informations
    echo "<div class='containerAlbum'>";
    echo "<img src='$pochette' alt='$titre'>";
    echo "<p class='TitreAlbum'>Titre: $titre</p>";
    echo "<p class='ArtisteAlbum'>Artiste: $artiste</p>";
    echo "</div>";

}
echo "</div>";
?>
