<?php
session_start();

// Assurez-vous que le tableau 'panier' existe dans la session
if (isset($_SESSION['panier'])) {
    $panierData = $_SESSION['panier'];
    echo json_encode($panierData);
} else {
    echo json_encode([]);
}
?>