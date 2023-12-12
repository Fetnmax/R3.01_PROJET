<?php
    session_start ();
    if (!isset($_SESSION['login']) && !isset($_SESSION['pwd'])) 
    {
        echo "Vous n'etes pas authentifié pour ajouter une image";
        return;
    } 

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // Recuperation des variables
        $titre = $_POST['titre']; 
        $auteur = $_POST['auteur'];
        $genre = $_POST['genre']; 
        $prix = $_POST['prix'];  
        $image = $_FILES['image']; 
        $targetFile = 'images/' . basename($image["name"]);
        echo "<h1>Nouveau Album ajouter a la collection</h1></br>";
        echo "Auteur: " . $auteur;
        echo "</br>";
        echo "Titre: ". $titre;
        echo "</br>";
        echo "Image: ". $image;
        echo "</br>";
        move_uploaded_file($image["tmp_name"], $targetFile);
        echo '<div><img src="' . $image . '" style="max-width: 100%;" alt="Image téléchargée"></div>';
        echo "</br>";

        echo 'Nouveau CD ajouté avec succès.';
    }
?>