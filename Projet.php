<?php
$xmlDoc = new DOMDocument();
$testXML = file_get_contents("CD.xml");
$xmlDoc->loadXML($testXML);

$cdList = $xmlDoc->getElementsByTagName("cd");

// Parcourir chaque CD et afficher les informations
foreach ($cdList as $cd) {
    $titre = $cd->getElementsByTagName("titre")->item(0)->nodeValue;
    $artiste = $cd->getElementsByTagName("artiste")->item(0)->nodeValue;
    $pochette = $cd->getElementsByTagName("pochette")->item(0)->nodeValue;

    // Affichage des informations
    echo "<div>";
    echo "<img src='$pochette' alt='$titre'>";
    echo "<p>Titre: $titre</p>";
    echo "<p>Artiste: $artiste</p>";
    echo "</div>";
}
?>
