<html> 
    <head> 
        <title>Formulaire d'identification</title> 
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <div class='container-nav'>
                        <li><a href="Index.php">Accueil</a></li>
                    </div>
                    <div class='container-nav'>
                    <?php
                        if ($connecter) {
                            echo '<li><a href="SupprimerAlbum.php">Supprimer un Album </a></li>';
                            echo '<li><a href="AjoutAlbum.php">Ajouter un Album </a></li>';
                            echo '<li><a href="logout.php">Se déconnecter</a></li>';
                        } else {
                            echo '<li><a href="PageDauthentification.php">Se connecter</a></li>';
                        }
                        ?>
                        <div class='nav-image'>
                            <button id="monBouton">
                                <img src="chariot.png" style="max-width: 100%;" alt="Image téléchargée">
                            </button>
                            <p id="nbPanier"></p>
                        </div>
                    </div>
                </ul>
            </nav>
        </header>>
        <form action="login.php" method="post"> 
            Votre login : 
            <input type="text" name="login">
            <br />
            Votre mot de passe : 
            <input type="password" name="pwd"><br />
            <input type="submit" value="Connexion">
        </form>
        <a href='Index.php'>Retour au menu</a>
    </body>
</html>