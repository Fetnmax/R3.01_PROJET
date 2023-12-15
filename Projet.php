<?php
    session_start ();
    $connecter = (isset($_SESSION['login']) && isset($_SESSION['pwd']));

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue de CD</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <div class='container-nav'>
                <li><a href="Projet.php">Accueil</a></li>
            </div>
            <div class='container-nav'>
            <?php
                if ($connecter) {
                    echo '<li><a href="SupprimerAlbum.php">Supprimer un Album </a></li>';
                    echo '<li><a href="AjoutAlbum.php">Ajouter un Album </a></li>';
                    echo '<li><a href="logout.php">Se déconnecter</a></li>';
                } else {
                    echo '<li><a href="PageDauthentification.html">Se connecter</a></li>';
                }
                ?>
                <div class='nav-image'>
                    <button id="monBouton">
                        <img src="chariot.png" style="max-width: 100%;" alt="Image téléchargée">
                    </button>
                    <p id="nbPanier"></p>
                </div>
            </div>
        </ul>
    </nav>
</header>
<article>
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
        echo '<button class="bouttonImage" type="submit" name="idCD" value="' .$id. '">';
        echo "<img src='genererImage.php?idCD=$id' alt='$titre'>";
        echo "</button>";
        echo '</form>';
        echo '</div>';

        //Texte
        echo '<div>';
        echo "<p class='TitreAlbum'>Titre: $titre</p>";
        echo "<p class='ArtisteAlbum'>Artiste: $artiste</p>";
        echo '</div>';
        
        //Bouton panier
        echo '<div class="enbas" value="'.$id.'">';
        //echo '<form action="detail.php" method="get">';
        //echo '<button type="submit" name="idCD" value="'.$id.'">Ajouter au panier</button>';
        //echo '</form>';
        echo '<button class="btnPanier">Ajouter au panier</button>';
            echo '<div class="editionPanier hide">';
            echo '<p>Quantité: </p>';
            echo '<input type="number" value="1">';
            echo '<button class="btnRetirerPanier">Retirer au panier</button>';
            echo '</div>';
        echo '</div>';

        echo "</div>";
    }
    echo "</div>";
?>
</article>
</body>
</html><script src="main.js"></script>