<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include('../db_connect.php');

// Récupérer tous les véhicules
$sql = "SELECT * FROM vehicules";
$stmt = $conn->prepare($sql);

if ($stmt->execute()) {
    $vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $vehicules = [];
}

// Vérifier si un message de succès a été défini (par exemple après une suppression ou une modification)
$successMessage = isset($_GET['success']) ? $_GET['success'] : null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Véhicules</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Style global */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        /* Menu latéral */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #007bff;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            color: white;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            display: block;
            font-size: 16px;
        }

        .sidebar ul li a:hover {
            background-color: #0056b3;
            border-radius: 5px;
        }

        /* Contenu principal */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        h1 {
            color: #343a40;
            margin-bottom: 20px;
        }

        .btn-ajouter {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-ajouter:hover {
            background-color: #0056b3;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        .btn-modifier {
            background-color: #28a745;
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .btn-modifier:hover {
            background-color: #218838;
        }

        .btn-supprimer {
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .btn-supprimer:hover {
            background-color: #c82333;
        }

        /* Message de succès */
        .message-success {
            background-color: #e8f5e9;
            color: #4CAF50;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #4CAF50;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
    <script>
        function confirmerSuppression(event, url) {
            event.preventDefault();
            if (confirm("Êtes-vous sûr de vouloir supprimer ce véhicule ?")) {
                window.location.href = url;
            }
        }
    </script>
</head>
<body>
    <!-- Menu latéral -->
    <div class="sidebar">
        <h2>Gestion Parking</h2>
        <ul>
            <li><a href="gestion_places.php"><i class="fas fa-parking"></i> Gestion des Places</a></li>
            <li><a href="gestion_vehicules.php"><i class="fas fa-car"></i> Gestion des Véhicules</a></li>
            <li><a href="../historique_stationnements.php"><i class="fas fa-history"></i> Historique</a></li>
            <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
        </ul>
    </div>

    <!-- Contenu principal -->
    <div class="main-content">
        <h1>Gestion des Véhicules</h1>

        <!-- Afficher le message de succès si défini -->
        <?php if ($successMessage): ?>
            <div class="message-success">
                <?= htmlspecialchars($successMessage) ?>
            </div>
        <?php endif; ?>

        <a href="../ajouter_vehicule.php" class="btn-ajouter">Ajouter un nouveau véhicule</a>
        <table>
            <thead>
                <tr>
                    <th>Numéro de Plaque</th>
                    <th>Propriétaire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($vehicules)): ?>
                    <?php foreach ($vehicules as $vehicule): ?>
                        <tr>
                            <td><?= htmlspecialchars($vehicule['plaque']) ?></td>
                            <td><?= htmlspecialchars($vehicule['proprietaire']) ?></td>
                            <td>
                                <a href="modifier_vehicule.php?id=<?= $vehicule['ID'] ?>" class="btn-modifier">Modifier</a>
                                <a href="#" onclick="confirmerSuppression(event, 'supprimer_vehicule.php?id=<?= $vehicule['ID'] ?>')" class="btn-supprimer">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Aucun véhicule trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
