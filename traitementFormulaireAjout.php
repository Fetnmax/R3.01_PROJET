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
<article>
<?php
    if (!isset($_SESSION['login']) && !isset($_SESSION['pwd'])) 
    {
        echo "Vous n'etes pas authentifié pour ajouter un Album";
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
        if($prix <= 0)
        {
            echo "Le prix doit etre superieur a 0";
            return;
        }
        echo "<h1>Nouveau Album ajouter a la collection</h1>";
        echo "Auteur: " . $auteur;
        echo "</br>";
        echo "Titre: ". $titre;
        echo "</br>";
        
        $tname = $targetFile;
        $i = 1;
        
        // Si le fichier existe déjà rajoute un numéro
        while (file_exists($targetFile)) {
            $path_info = pathinfo($tname);
            $filename = $path_info['filename'];
            $extension = isset($path_info['extension']) ? '.' . $path_info['extension'] : '';

            $targetFile = 'images/' . $filename . '(' . $i . ')' . $extension;
            $i++;
        }
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
        $result= mysqli_query($link,$query);
        if ($result) {
            echo 'Nouveau CD ajouté avec succès.';
        } else {
            echo "Erreur d'insertion : " . mysqli_error($link);
        }
    }
?>