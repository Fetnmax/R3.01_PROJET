<?php
    session_start ();

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
<?php include('navbar.php'); ?>
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
            // La quantité doit etre compris entre 1 et 99 et un entier
            $quantite = floor($quantite);
            $quantite = max(1, min(99, $quantite));

            $query = "SELECT * FROM CD WHERE id = $id ORDER BY id";
            $result= mysqli_query($link,$query);
            if (!$result) {
                echo "Erreur sur la requete";
                return;
            }
            if (mysqli_num_rows($result) == 0) {
                echo "Erreur sur le panier des modifications ont eu lieu entre temps.";
                $_SESSION['panier'] = null;
                return;
            }
            while ($donnees=mysqli_fetch_assoc($result)) {
                $id = $donnees['id'];
                $titre = $donnees['titre'];
                $artiste = $donnees['artiste'];
                $pochette = $donnees['pochette'];
                $prix = $donnees['prix'];
                $prixPanier += $prix * $quantite;
                if($prix <= 0)
                {
                    echo "Erreur innatendu";
                    return;
                }

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
                echo "<p class='Info-quantite-prix gras'>Prix cd: ".$prix*$quantite."</p>";
                echo '</div>';

                echo '</div>';

            }
            
        }
        echo "<p class='PrixPanier'>Prix du panier: $prixPanier €</p>";
        echo "</aside>";
        ?>
        <article>
        <form action="paiement.php" method="post">
        <label for="cardNumber">Numéro de Carte de Crédit (16 chiffres):</label>
        <input type="text" id="cardNumber" name="cardNumber" maxlength="16" required></br>

        <label for="expirationDate">Date d'Expiration (MM/YY):</label>
        <input type="text" id="expirationDate" name="expirationDate" pattern="\d{2}/\d{2}" placeholder="MM/YY" required></br>
        </br>
        <button type="submit" class="btnPayer">Payer</button>      
        </br> 
        <?php
            echo "<p class='PrixPanier'>Prix du panier: $prixPanier €</p>";
        ?>
        </form>        
        </article>
</body>
</html><script src="main.js"></script>