<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('db_connect.php');

// Vérifier si l'utilisateur est admin
$is_admin = ($_SESSION['role'] == 'admin');

// Si l'utilisateur est un admin, il peut voir tous les stationnements, sinon il voit seulement les siens
if ($is_admin) {
    // Récupérer l'historique de tous les stationnements
    $sql = "SELECT s.ID, v.plaque, v.proprietaire, p.numero, s.date_entree, s.date_sortie
            FROM stationnements s
            JOIN vehicules v ON s.vehicule_id = v.ID
            JOIN places p ON s.place_id = p.ID
            ORDER BY s.date_entree DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
} else {
    // Récupérer l'historique des stationnements de l'utilisateur connecté
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT s.ID, v.plaque, v.proprietaire, p.numero, s.date_entree, s.date_sortie
            FROM stationnements s
            JOIN vehicules v ON s.vehicule_id = v.ID
            JOIN places p ON s.place_id = p.ID
            WHERE v.ID = :user_id
            ORDER BY s.date_entree DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
}

$stationnements = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Stationnements</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="admin.css">
    <style>
        /* Style général pour la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .background-main {
            background:url('images/login.jpg') no-repeat center center/cover;
        }

        .parking-display {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .parking-display h1 {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2196F3;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .level-name {
            font-weight: bold;
        }

        .level {
            font-size: 16px;
            color: #555;
        }

        .level span {
            color: red;
        }
    </style>
</head>
<body class="background-main">
    <?php include 'header.php'; ?>

    <div class="parking-display">
        <h1>Historique des Stationnements</h1>
        <table>
            <thead>
                <tr>
                    <th class="level-name">Numéro de Plaque</th>
                    <th class="level-name">Propriétaire</th>
                    <th class="level-name">Numéro de Place</th>
                    <th class="level-name">Date d'Entrée</th>
                    <th class="level-name">Date de Sortie</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($stationnements) > 0): ?>
                    <?php foreach ($stationnements as $stationnement): ?>
                        <tr class="level">
                            <td><?= htmlspecialchars($stationnement['plaque']) ?></td>
                            <td><?= htmlspecialchars($stationnement['proprietaire']) ?></td>
                            <td><?= htmlspecialchars($stationnement['numero']) ?></td>
                            <td><?= htmlspecialchars($stationnement['date_entree']) ?></td>
                            <td>
                                <?php if ($stationnement['date_sortie']): ?>
                                    <?= htmlspecialchars($stationnement['date_sortie']) ?>
                                <?php else: ?>
                                    <span style="color: red;">En cours</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Aucun stationnement trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
