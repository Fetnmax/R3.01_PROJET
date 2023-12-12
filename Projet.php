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
    $bdd= "scurran_bd"; // Base de données
    $host= "lakartxela.iutbayonne.univ-pau.fr";
    $user= "scurran_bd"; // Utilisateur
    $pass= "scurran_bd"; // mp
    $nomtable= "CD"; /* Connection bdd */
    $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de données");
    $query = "SELECT * FROM CD ORDER BY id";
    $result= mysqli_query($link,$query);

    echo "<h2>Catalogue</h2>";
    echo "<div class='mesAlbums'>";
    // Parcourir chaque CD et afficher les informations
    while ($donnees=mysqli_fetch_assoc($result)) {
        $id = $donnees['id'];
        $titre = $donnees['titre'];
        $artiste = $donnees['artiste'];
        $pochette = $donnees['pochette'];

        // Affichage des informations
        echo "<div class='containerAlbum'>";
        echo "<img src='genererImage.php?idCD=$id' alt='$titre'>";
        echo "<p class='TitreAlbum'>Titre: $titre</p>";
        echo "<p class='ArtisteAlbum'>Artiste: $artiste</p>";
        echo '<form action="detail.php" method="get">';
        echo '<button type="submit" name="idCD" value="'.$id.'">Choisir</button>';
        echo '</form>';
        echo "</div>";
    }
    echo "</div>";
?>
</body>
</html>