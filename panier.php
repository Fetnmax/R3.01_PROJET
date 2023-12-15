<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du panier depuis la requête POST
    $monPanier = $_POST;

    // Parcourir et afficher les données du panier
    echo "<h2>Contenu du panier :</h2>";
    echo "<ul>";
    foreach ($monPanier as $id => $quantite) {
        $quantite += 1;
        echo "<li>Article : $id | Quantité : $quantite</li>";
        // ... Traiter les données du panier ici si nécessaire
    }
    echo "</ul>";
}
?>
