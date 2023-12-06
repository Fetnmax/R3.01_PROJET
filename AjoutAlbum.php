<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page d'Album</title>
    <link rel="stylesheet" href="projet.css">
</head>
<body>
<h2>Ajouter un Nouvel Album</h2>

<form action="traitementFormulaire.php" method="POST">
    <!-- Champ pour le titre -->
    <label for="titre">Titre de l'album:</label>
    <input type="text" id="titre" name="titre" required>
    </br>
    <!-- Champ pour l'auteur -->
    <label for="auteur">Auteur/Groupe:</label>
    <input type="text" id="auteur" name="auteur" required>
    </br>
    <!-- Champ pour l'image (URL) -->
    <label for="image">Image de l'album:</label>
    <input type="file" id="image" name="image" accept="image/*" required>
    </br>
    <!-- Bouton de soumission -->
    <input type="submit" value="Ajouter">

</form>
</body>