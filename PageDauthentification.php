<?php
    session_start ();
?>
<html> 
    <head> 
        <title>Formulaire d'identification</title> 
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php include('navbar.php'); ?>
        <article>
            <form action="login.php" method="post"> 
                Votre login : 
                <input type="text" name="login">
                <br />
                Votre mot de passe : 
                <input type="password" name="pwd"><br />
                <input type="submit" value="Connexion" class="btnConnexion">
            </form>
        </article>
    </body>
</html>