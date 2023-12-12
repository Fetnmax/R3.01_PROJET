<?php
    header("Content-type: image/jpeg");
    
    $idCD = $_GET['idCD'];
    
    $bdd= "scurran_bd"; // Base de données
    $host= "lakartxela.iutbayonne.univ-pau.fr";
    $user= "scurran_bd"; // Utilisateur
    $pass= "scurran_bd"; // mp
    $nomtable= "CD"; // Connection bdd 
    $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de données");
    $query = "SELECT * FROM CD WHERE id = $idCD";
    $result= mysqli_query($link,$query);
    
    while ($donnees=mysqli_fetch_assoc($result)) {
        $pochette = $donnees['pochette'];
    }

    $im = imagecreatefromjpeg($pochette);
    $im = imagescale($im,200,200);
    imagejpeg($im);
    imagedestroy($im);

?>