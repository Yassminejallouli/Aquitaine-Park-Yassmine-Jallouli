<?php
session_start();
include('../db_connect.php'); // Connexion à la base de données

// Vérification du rôle d'administrateur
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "Accès refusé. Vous devez être administrateur.";
    exit();
}

$message = '';

// Gestion des actions (ajouter, modifier, supprimer)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Ajouter une place
        if ($action === 'add_place') {
            $numero = $_POST['numero'];

            try {
                $sql = "INSERT INTO places (numero) VALUES (:numero)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':numero', $numero, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    $message = "Place ajoutée avec succès.";
                } else {
                    $message = "Erreur lors de l'ajout de la place.";
                }
            } catch (PDOException $e) {
                $message = "Erreur : " . $e->getMessage();
            }
        }

        // Modifier le statut d'une place
        if ($action === 'update_status') {
            $place_id = $_POST['place_id'];
            $statut = $_POST['statut'];

            try {
                $sql = "UPDATE places SET statut = :statut WHERE ID = :place_id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':statut', $statut);
                $stmt->bindParam(':place_id', $place_id, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    $message = "Statut de la place mis à jour avec succès.";
                } else {
                    $message = "Erreur lors de la mise à jour du statut.";
                }
            } catch (PDOException $e) {
                $message = "Erreur : " . $e->getMessage();
            }
        }

        // Supprimer une place
        if ($action === 'delete_place') {
            $place_id = $_POST['place_id'];

            try {
                $sql = "DELETE FROM places WHERE ID = :place_id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':place_id', $place_id, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    $message = "Place supprimée avec succès.";
                } else {
                    $message = "Erreur lors de la suppression de la place.";
                }
            } catch (PDOException $e) {
                $message = "Erreur : " . $e->getMessage();
            }
        }
    }
}

// Récupérer toutes les places
try {
    $sql = "SELECT * FROM places";
    $stmt = $conn->query($sql);
    $places = $stmt->fetchAll();
} catch (PDOException $e) {
    $message = "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Places</title>
    <link rel="stylesheet" href="admin.css">
    <script>
        // Afficher une alerte si un message est défini en PHP
        const message = <?= json_encode($message) ?>;
        if (message) {
            alert(message);
        }
    </script>
    <style>
        .container {
    width: 80%;
    margin: auto;
    padding: 20px;
}

h2, h3 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}

form {
    margin-top: 20px;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 5px 10px;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <?php include '../header.php'; ?>

    <div class="container">
        <h2>Gestion des Places de Stationnement</h2>

        <!-- Formulaire pour ajouter une place -->
        <form action="gestion_places.php" method="POST" class="form-section">
            <h3>Ajouter une Place</h3>
            <input type="hidden" name="action" value="add_place">
            <label for="numero">Numéro de la place :</label>
            <input type="number" id="numero" name="numero" required>
            <button type="submit">Ajouter</button>
        </form>

        <!-- Liste des places -->
        <h3>Liste des Places</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Numéro</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($places as $place) : ?>
                    <tr>
                        <td><?= $place['ID'] ?></td>
                        <td><?= $place['numero'] ?></td>
                        <td><?= $place['statut'] ?></td>
                        <td>
                            <!-- Modifier le statut -->
                            <form action="gestion_places.php" method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="update_status">
                                <input type="hidden" name="place_id" value="<?= $place['ID'] ?>">
                                <select name="statut" required>
                                    <option value="libre" <?= $place['statut'] === 'libre' ? 'selected' : '' ?>>Libre</option>
                                    <option value="occupée" <?= $place['statut'] === 'occupée' ? 'selected' : '' ?>>Occupée</option>
                                </select>
                                <button type="submit">Modifier</button>
                            </form>

                            <!-- Supprimer une place -->
                            <form action="gestion_places.php" method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="delete_place">
                                <input type="hidden" name="place_id" value="<?= $place['ID'] ?>">
                                <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette place ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php include '../footer.php'; ?>
</body>
</html>
