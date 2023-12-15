<?php
    session_start ();
    if (!isset($_SESSION['login']) && !isset($_SESSION['pwd'])) 
    {
        echo "Vous n'etes pas authentifié pour ajouter un Album";
        return;
    } 

    var_dump($_FILES);
    var_dump($_POST);

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
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
        echo '<div><img src="' . $targetFile . '" style="max-width: 100%;" alt="Image téléchargée"></div>';
        echo "</br>";
        $bdd= "scurran_bd"; // Base de données
        $host= "lakartxela.iutbayonne.univ-pau.fr";
        $user= "scurran_bd"; // Utilisateur
        $pass= "scurran_bd"; // mp
        $nomtable= "CD"; /* Connection bdd */
        $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de données");
        $query = "INSERT INTO CD (titre, artiste, genre, prix, pochette) 
        VALUES ('$titre', '$auteur', '$genre', $prix, '$targetFile');";
        echo $query;
        $result= mysqli_query($link,$query);
        if ($result) {
            echo 'Nouveau CD ajouté avec succès.';
        } else {
            echo "Erreur d'insertion : " . mysqli_error($link);
        }
    }
?>