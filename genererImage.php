<?php
    header("Content-type: image/jpeg");
<<<<<<< HEAD
    $idCD = $_GET['idCD'];

    $testXML = file_get_contents("CD.xml");
    $catalogue = new DOMDocument();

    $catalogue->loadXML($testXML);

    $cdList = $catalogue->getElementsByTagName("cd");
    error_log('Debug message: Something happened');
    $pochette = $cdList[0]->getElementsByTagName("pochette")->item(0)->nodeValue;
=======

    $idCD = $_GET['idCD'];
    
    $bdd= "scurran_bd"; // Base de données
    $host= "lakartxela.iutbayonne.univ-pau.fr";
    $user= "scurran_bd"; // Utilisateur
    $pass= "scurran_bd"; // mp
    $nomtable= "CD"; // Connection bdd 
    $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de données");
    $query = "SELECT * FROM CD WHERE id = $idCD";
    $result= mysqli_query($link,$query);
    
    while ($donnees=mysqli_fetch_assoc($result)) {
        $pochette = $donnees['pochette'];
    }

>>>>>>> 31564693ffd2d02e1bec998f51f069a2a040dc27
    $im = imagecreatefromjpeg($pochette);
    $im = imagescale($im,200,200);
    imagejpeg($im);
    imagedestroy($im);

    /*$catalogue = new DOMDocument();
$testXML = file_get_contents("CD.xml");
$catalogue->loadXML($testXML);

$cdList = $catalogue->getElementsByTagName("cd");

$id = 0;

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
echo "</div>";*/
?>