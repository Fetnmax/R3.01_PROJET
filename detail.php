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
                <li><a href="Index.php">Accueil</a></li>
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
<?php
    $idCD = $_GET['idCD'];
    
    $bdd= "scurran_bd"; // Base de données
    $host= "lakartxela.iutbayonne.univ-pau.fr";
    $user= "scurran_bd"; // Utilisateur
    $pass= "scurran_bd"; // mp
    $nomtable= "CD"; /* Connection bdd */
    $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de données");
    $query = "SELECT * FROM CD WHERE id = $idCD";
    $result= mysqli_query($link,$query);

    while ($donnees=mysqli_fetch_assoc($result)) {
        $titre = $donnees['titre'];
        $artiste = $donnees['artiste'];
        $pochette = $donnees['pochette'];
        $genre = $donnees['genre'];
        $prix = $donnees['prix'];
    }

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
</body>
</html><script src="main.js"></script>