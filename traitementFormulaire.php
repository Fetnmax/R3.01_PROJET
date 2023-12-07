<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // Recuperation des variables
        $titre = $_POST['titre']; 
        $auteur = $_POST['auteur'];
        $genre = $_POST['genre']; 
        $prix = $_POST['prix'];  
        $image = $_POST['image']; 

        echo "<h1>Nouveau Album ajouter a la collection</h1></br>";
        echo "Auteur: " . $auteur;
        echo "</br>";
        echo "Titre: ". $titre;
        echo "</br>";
        echo "Image: ". $image;
        // Chemin vers votre fichier XML
        $cheminFichierXML = "CD.xml";

        // Charger le fichier XML
        $xml = simplexml_load_file($cheminFichierXML);
        
        //$catalogue = $xml->getElementsByTagName("catalogue");

        // Ajouter un nouveau CD au catalogue
        $nouveauCd = $xml->addChild('cd',"\n\t\t");
        $nouveauCd->addChild("titre", $titre. "\n\t\t"); // Je veux une tabulation et un saut de ligne 
        $nouveauCd->addChild("artiste", $auteur. "\n\t\t"); // Je veux un saut de ligne
        $nouveauCd->addChild("genre", $genre. "\n\t\t");// Je veux un saut de ligne 
        $nouveauCd->addChild("prix", $prix."\n\t\t");// Je veux un saut de ligne 
        $nouveauCd->addChild("pochette", $image."\n\n\t");// Je veux un saut de ligne 

        // Convertir l'objet SimpleXML en objet DOM
        $dom = dom_import_simplexml($xml)->ownerDocument;

        // Formater la sortie XML avec des espaces et des tabulations
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;

        // Sauvegarder le fichier XML mis à jour
        $dom->save($cheminFichierXML);


        echo 'Nouveau CD ajouté avec succès.';
    }
?>