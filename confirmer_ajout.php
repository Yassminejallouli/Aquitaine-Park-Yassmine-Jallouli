<?php
session_start();
include('db_connect.php');

$message = '';
$message_class = ''; // Pour la classe de message (success ou error)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plaque = $_POST['plaque'];
    $proprietaire = $_POST['proprietaire'];
    $telephone = $_POST['telephone'];
    $place_id = $_POST['place_id'];

    try {
        // Vérifier si le véhicule existe déjà
        $sql_check = "SELECT * FROM vehicules WHERE plaque = :plaque";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bindParam(':plaque', $plaque, PDO::PARAM_STR);
        $stmt_check->execute();

        if ($stmt_check->rowCount() > 0) {
            $message = "Ce véhicule est déjà enregistré.";
            $message_class = 'error'; // Message d'erreur
        } else {
            // Ajouter un nouveau véhicule
            $sql_insert = "INSERT INTO vehicules (plaque, proprietaire, telephone) VALUES (:plaque, :proprietaire, :telephone)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bindParam(':plaque', $plaque, PDO::PARAM_STR);
            $stmt_insert->bindParam(':proprietaire', $proprietaire, PDO::PARAM_STR);
            $stmt_insert->bindParam(':telephone', $telephone, PDO::PARAM_STR);

            if ($stmt_insert->execute()) {
                $vehicule_id = $conn->lastInsertId();

                // Vérifier si la place est libre
                $sql_check_place = "SELECT * FROM places WHERE ID = :place_id AND statut = 'libre'";
                $stmt_check_place = $conn->prepare($sql_check_place);
                $stmt_check_place->bindParam(':place_id', $place_id, PDO::PARAM_INT);
                $stmt_check_place->execute();

                if ($stmt_check_place->rowCount() > 0) {
                    // Réserver la place
                    $sql_update_place = "UPDATE places SET statut = 'occupée' WHERE ID = :place_id";
                    $stmt_update_place = $conn->prepare($sql_update_place);
                    $stmt_update_place->bindParam(':place_id', $place_id, PDO::PARAM_INT);
                    $stmt_update_place->execute();

                    // Ajouter le stationnement
                    $sql_insert_stationnement = "INSERT INTO stationnements (vehicule_id, place_id, date_entree) VALUES (:vehicule_id, :place_id, NOW())";
                    $stmt_insert_stationnement = $conn->prepare($sql_insert_stationnement);
                    $stmt_insert_stationnement->bindParam(':vehicule_id', $vehicule_id, PDO::PARAM_INT);
                    $stmt_insert_stationnement->bindParam(':place_id', $place_id, PDO::PARAM_INT);
                    $stmt_insert_stationnement->execute();

                    $message = "Véhicule ajouté avec succès et place réservée.";
                    $message_class = 'success'; // Message de succès
                } else {
                    $message = "La place est déjà occupée.";
                    $message_class = 'error'; // Message d'erreur
                }
            } else {
                $message = "Erreur lors de l'ajout du véhicule.";
                $message_class = 'error'; // Message d'erreur
            }
        }
    } catch (PDOException $e) {
        $message = "Erreur : " . $e->getMessage();
        $message_class = 'error'; // Message d'erreur
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10;
        }
        .background-main {
            background: url('images/affiche_place.jpg') no-repeat center center/cover;
            padding: 100px 0;
            background-size: cover;
            background-position: center center;
        }
        .message-container a {
            display: inline-block;
            margin-top: 30px;
            padding: 20px 30px;
            background-color: #05122e;
            color: white;
            text-decoration: none;
            border-radius: 10px;
        }
        .message-container a:hover {
            background-color: #05122e;
        }

        /* Style du cadre de message */
        .message-container {
            border: 2px solid #ccc;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .message-container.success {
            border-color: #4CAF50;
            background-color: #e8f5e9;
            color: #4CAF50;
            border-radius: 10px;
        }

        .message-container.error {
            border-color: #f44336;
            background-color: #fbe9e7;
            color: #f44336;
            border-radius: 10px;
        }

        .message-container h2 {
            font-size: 24px;
            font-weight: bold;
        }

        .message-container p {
            font-size: 18px;
            margin: 10px 0;
        }

        .message-container .btn-deconnexion {
            padding: 10px 20px;
            background-color: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .message-container .btn-deconnexion:hover {
            background-color: #0b79d0;
        }
    </style>
</head>
<body class="background-main">
    <h1 class="text-center">Confirmation</h1>
    <div class="message-container <?= $message_class ?>">
        <h2><?= htmlspecialchars($message) ?></h2>
        <a href="user/afficher_places.php" class="btn-deconnexion">Retour</a>
        <a href="logout.php" class="btn-deconnexion">Se deconnecter</a>
    </div>
</body>
</html>