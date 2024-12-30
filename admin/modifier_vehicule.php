<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include('../db_connect.php');

if (isset($_GET['id'])) {
    $vehicule_id = $_GET['id'];

    $sql = "SELECT * FROM vehicules WHERE ID = :vehicule_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':vehicule_id', $vehicule_id);
    $stmt->execute();
    $vehicule = $stmt->fetch();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $plaque = $_POST['plaque'];
        $proprietaire = $_POST['proprietaire'];

        $sql_update = "UPDATE vehicules SET plaque = :plaque, proprietaire = :proprietaire WHERE ID = :vehicule_id";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bindParam(':plaque', $plaque);
        $stmt_update->bindParam(':proprietaire', $proprietaire);
        $stmt_update->bindParam(':vehicule_id', $vehicule_id);
        $stmt_update->execute();

        header("Location: gestion_vehicules.php?success=1");
        exit();
    }
} else {
    echo "Véhicule non trouvé.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Véhicule</title>
    <style>
                /* Style global pour la page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Style de la section de modification */
        .parking-display {
            background-color: #fff;
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .parking-display h1 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Style pour les labels et les champs de saisie */
        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="text"]:focus {
            border-color: #2196F3;
            outline: none;
        }

        /* Style pour le bouton de soumission */
        button[type="submit"] {
            background-color: #2196F3;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0b79d0;
        }

        /* Style pour les messages de succès ou d'erreur */
        .message {
            padding: 15px;
            margin: 20px 0;
            text-align: center;
            border-radius: 5px;
        }

        .success {
            background-color: #4CAF50;
            color: white;
        }

        .error {
            background-color: #f44336;
            color: white;
        }

        /* Style pour la barre de navigation */
        header {
            background-color: #05122e;
            padding: 10px 0;
            color: white;
            text-align: center;
        }

        footer {
            background-color: #05122e;
            padding: 10px 0;
            color: white;
            text-align: center;
        }

        /* Style pour le fond d'écran */
        .background-main {
            background: url('../images/affiche_place.jpg') no-repeat center center/cover;
            background-size: cover;
            padding: 50px 0;
        }

    </style>
</head>
<body class="background-main">
    <?php include '../header.php'; ?>
    <div class="parking-display">
        <h1>Modifier Véhicule</h1>
        <form method="POST">
            <label for="plaque">Numéro de Plaque :</label>
            <input type="text" name="plaque" value="<?= htmlspecialchars($vehicule['plaque']) ?>" required>
            <br>
            <label for="proprietaire">Nom du Propriétaire :</label>
            <input type="text" name="proprietaire" value="<?= htmlspecialchars($vehicule['proprietaire']) ?>" required>
            <br>
            <button type="submit" class="btn-reserver">Mettre à jour</button>
        </form>
    </div>
    <?php include '../footer.php'; ?>
</body>
</html>
