<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include('../db_connect.php');

if (isset($_GET['id'])) {
    $vehicule_id = $_GET['id'];

    try {
        // Supprimer d'abord les enregistrements dans la table stationnements
        $sql_delete_stationnement = "DELETE FROM stationnements WHERE vehicule_id = :vehicule_id";
        $stmt_delete_stationnement = $conn->prepare($sql_delete_stationnement);
        $stmt_delete_stationnement->bindParam(':vehicule_id', $vehicule_id);
        $stmt_delete_stationnement->execute();

        // Ensuite, supprimer le véhicule
        $sql_delete_vehicule = "DELETE FROM vehicules WHERE ID = :vehicule_id";
        $stmt_delete_vehicule = $conn->prepare($sql_delete_vehicule);
        $stmt_delete_vehicule->bindParam(':vehicule_id', $vehicule_id);

        if ($stmt_delete_vehicule->execute()) {
            header("Location: gestion_vehicules.php?success=2");
            exit();
        } else {
            echo "Erreur lors de la suppression du véhicule.";
            exit();
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        exit();
    }
} else {
    echo "Aucun véhicule spécifié.";
    exit();
}
?>
