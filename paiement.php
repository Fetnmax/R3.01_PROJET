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
    echo "<article>";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numeroCarte = $_POST['cardNumber'];
        $dateExpiration = $_POST['expirationDate'];

        // Validation du numéro de carte (16 chiffres)
        if (!preg_match('/^\d{16}$/', $numeroCarte)) {
            echo "Numéro de carte invalide. Veuillez saisir un numéro de carte valide (16 chiffres).";
        } else {
            // Vérification de la correspondance entre le premier et le dernier chiffre
            $premierChiffre = $numeroCarte[0];
            $dernierChiffre = $numeroCarte[strlen($numeroCarte) - 1];

            if ($premierChiffre !== $dernierChiffre) {
                echo "Le premier et le dernier chiffre de la carte ne correspondent pas.";
            } else {
                // Vérification de la date d'expiration (supérieure à la date actuelle + 3 mois)
                $aujourdhui = new DateTime();
                $dateExpirationObj = DateTime::createFromFormat('m/y', $dateExpiration);
                $dateExpirationObj->modify('first day of next month');

                $expirationPlus3Mois = $aujourdhui->modify('+3 months');

                if ($dateExpirationObj <= $expirationPlus3Mois) {
                    echo "La date d'expiration de la carte est invalide.";
                } else {
                    $_SESSION['panier'] = null;
                    echo "Merci de votre achat !";
                }
            }
        }
    } else {
        header("Location: panier.php");
        exit;
    }
    echo "</article>";
?>
</body>
</html><script src="main.js"></script>