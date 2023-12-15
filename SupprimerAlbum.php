<?php
    session_start ();
    if (!isset($_SESSION['login']) && !isset($_SESSION['pwd'])) 
    {
        echo "Vous n'etes pas authentifié pour supprimer un CD";
        return;
    } 
    
    $bdd= "scurran_bd"; // Base de données
    $host= "lakartxela.iutbayonne.univ-pau.fr";
    $user= "scurran_bd"; // Utilisateur
    $pass= "scurran_bd"; // mp
    $nomtable= "CD"; /* Connection bdd */
    $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de données");
    $query = "SELECT * FROM CD ORDER BY id";
    $result= mysqli_query($link,$query);
    echo "<h2>Catalogue</h2>";

    /* On récupère nos variables de session*/
    echo "<div class='mesAlbums'>";
    // Parcourir chaque CD et afficher les informations
    while ($donnees=mysqli_fetch_assoc($result)) {
        $id = $donnees['id'];
        $titre = $donnees['titre'];
        $artiste = $donnees['artiste'];
        $pochette = $donnees['pochette'];

        // Affichage des informations
        echo "<div class='containerAlbum' value = ".$id.">";
        //Image Boutton
        echo '<div>';
        echo '<form action="detail.php" method="get">';
        echo "<img src='genererImage.php?idCD=$id' alt='$titre'>";
        echo '</form>';
        echo '</div>';

        //Texte
        echo '<div>';
        echo "<p class='TitreAlbum'>Titre: $titre</p>";
        echo "<p class='ArtisteAlbum'>Artiste: $artiste</p>";
        echo '</div>';
        echo '<form action="traitementFormulaireSup.php" method="POST">';
        echo '<button type="submit" name="idCD" value="'.$id.'">Supprimer Album</button>';
        echo '</form>';

        echo "</div>";
        echo "</br>";
    }
    echo "</div>";
?>