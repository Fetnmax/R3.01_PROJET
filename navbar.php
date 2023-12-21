<header>
    <nav>
        <ul>
            <div class='container-nav'>
                <li><a href="Index.php">Accueil</a></li>
            </div>
            <div class='container-nav'>
            <?php
                $connecter = (isset($_SESSION['login']) && isset($_SESSION['pwd']));
                if ($connecter) {
                    echo '<li><a href="SupprimerAlbum.php">Supprimer un Album </a></li>';
                    echo '<li><a href="AjoutAlbum.php">Ajouter un Album </a></li>';
                    echo '<li><a href="logout.php">Se déconnecter</a></li>';
                } else {
                    echo '<li><a href="PageDauthentification.php">Se connecter</a></li>';
                }
                ?>
                <div class='nav-image hide'>
                    <button id="monBouton">
                        <img src="chariot.png" style="max-width: 100%;" alt="Image téléchargée">
                    </button>
                    <p id="nbPanier"></p>
                </div>
            </div>
        </ul>
    </nav>
</header>