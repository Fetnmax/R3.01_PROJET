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