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
if (!$_SERVER["REQUEST_METHOD"] == "POST") 
{
    return;
}
    // Récupérer les données du panier depuis la requête POST
    $monPanier = $_POST;

    $bdd= "scurran_bd"; // Base de données
    $host= "lakartxela.iutbayonne.univ-pau.fr";
    $user= "scurran_bd"; // Utilisateur
    $pass= "scurran_bd"; // mp
    $nomtable= "CD"; /* Connection bdd */
    $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de données");
    if (empty($monPanier)) {
        echo "<h2>Votre panier est vide.</h2>";
        return;
    }
    $prixPanier = 0;
    echo "<aside>";
    // Vérifier si le panier est vide
        // Afficher le contenu du panier
        echo "<h2>Votre panier :</h2>";
        foreach ($monPanier as $id => $quantite) {
            $query = "SELECT * FROM CD WHERE id = $id ORDER BY id";
            $result= mysqli_query($link,$query);
            while ($donnees=mysqli_fetch_assoc($result)) {
                $id = $donnees['id'];
                $titre = $donnees['titre'];
                $artiste = $donnees['artiste'];
                $pochette = $donnees['pochette'];
                $prix = $donnees['prix'];

                $prixPanier += $prix * $quantite;

                echo "<div class='recapAlbum' value = ".$id.">";
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
                echo "<p class='Info-quantite-prix'>Quantite: $quantite</p>";
                echo "<p class='Info-quantite-prix'>Prix unitaire: $prix</p>";
                echo "<p class='Info-quantite-prix'>Prix cd: ".$prix*$quantite."</p>";
                echo '</div>';

                echo '</div>';

            }
            
        }
        echo "<p class='PrixPanier'>Prix du panier: $prixPanier €</p>";
        echo "</aside>";
        ?>
        <article>
        <form onsubmit="return simulatePayment()">
        <label for="cardNumber">Numéro de Carte de Crédit (16 chiffres):</label>
        <input type="text" id="cardNumber" maxlength="16" required></br>

        <label for="expirationDate">Date d'Expiration (MM/YY):</label>
        <input type="text" id="expirationDate" pattern="\d{2}/\d{2}" placeholder="MM/YY" required></br>

        <button type="submit" class="btnPayer">Payer</button>
        </form>        
        </article>
</body>
</html><script src="main.js"></script>