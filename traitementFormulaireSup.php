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
        echo "Vous n'etes pas authentifié pour supprimer un Album";
        return;
    } 
    $bdd= "scurran_bd"; // Base de données
    $host= "lakartxela.iutbayonne.univ-pau.fr";
    $user= "scurran_bd"; // Utilisateur
    $pass= "scurran_bd"; // mp
    $nomtable= "CD"; /* Connection bdd */
    $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de données");

    $requeteRecupImage = "SELECT pochette
    FROM CD
    WHERE id = ".$_POST['idCD'].";";
    $result = mysqli_query($link,$requeteRecupImage);
    if($result){
        $pochette = mysqli_fetch_assoc($result)['pochette'];
        if (file_exists($pochette)) {
            unlink($pochette);
        }
    }

    $requete = "DELETE FROM CD
    WHERE id = ".$_POST['idCD'].";";
    $result= mysqli_query($link,$requete);
    echo "L'album a été supprimé";

?>