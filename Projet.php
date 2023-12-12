<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue de CD</title>
    <link rel="stylesheet" href="projet.css">
</head>
<body>

<?php
$catalogue = new DOMDocument();
$testXML = file_get_contents("CD.xml");
$catalogue->loadXML($testXML);

$cdList = $catalogue->getElementsByTagName("cd");

$id = 0;

//session_start();
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) 
{
    echo '<a href="logout.php"> se deconnecter </a>';
}
else
{
    echo '<a href="PageDauthentification.html"> se connecter </a>';
}
echo "<h2>Catalogue</h2>";

echo "<div class='mesAlbums'>";
// Parcourir chaque CD et afficher les informations
foreach ($cdList as $cd) {
    $titre = $cd->getElementsByTagName("titre")->item(0)->nodeValue;
    $artiste = $cd->getElementsByTagName("artiste")->item(0)->nodeValue;
    $pochette = $cd->getElementsByTagName("pochette")->item(0)->nodeValue;

    // Affichage des informations
    echo "<div class='containerAlbum'>";
    echo "<img src='genererImage.php?idCD=$id' alt='$titre'>";
    echo "<p class='TitreAlbum'>Titre: $titre</p>";
    echo "<p class='ArtisteAlbum'>Artiste: $artiste</p>";
    echo '<form action="detail.php" method="get">';
    echo '<button type="submit" name="idCD" value="'.$id.'">Choisir</button>';
    echo '</form>';
    echo "</div>";

    $id++;
}
echo "</div>";
?>
</body>
</html>