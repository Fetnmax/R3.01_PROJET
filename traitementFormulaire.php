<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $titre = $_POST['titre']; 
        $auteur = $_POST['auteur']; 
        $image = $_POST['image']; 
        echo "<h1>Nouveau Album ajouter a la collection</h1></br>";
        echo "Auteur: " . $auteur;
        echo "</br>";
        echo "Titre: ". $titre;
        echo "</br>";
        echo "Image: ". $image;
    }
?>