<?php
session_start();
include('../db_connect.php'); // Connexion à la base de données

// Vérification de l'utilisateur connecté
if (!isset($_SESSION['user_id'])) {
    echo "Accès refusé. Veuillez vous connecter.";
    exit();
}

$user_id = $_SESSION['user_id'];
$message = ''; // Initialisation de la variable $message

// Gestion de la sortie du véhicule
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['vehicule_id'])) {
        $vehicule_id = $_POST['vehicule_id'];

        try {
            // Vérifier si le stationnement existe
            $sql = "SELECT s.*, p.ID AS place_id 
                    FROM stationnements s
                    JOIN places p ON s.place_id = p.ID
                    WHERE s.vehicule_id = :vehicule_id AND s.date_sortie IS NULL";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':vehicule_id', $vehicule_id, PDO::PARAM_INT);
            $stmt->execute();
            $stationnement = $stmt->fetch();

            if ($stationnement) {
                // Mettre à jour la table stationnements avec la date de sortie
                $date_sortie = date('Y-m-d H:i:s');
                $sql = "UPDATE stationnements SET date_sortie = :date_sortie WHERE vehicule_id = :vehicule_id AND date_sortie IS NULL";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':date_sortie', $date_sortie);
                $stmt->bindParam(':vehicule_id', $vehicule_id, PDO::PARAM_INT);
                $stmt->execute();

                // Mettre à jour la table places pour marquer la place comme libre
                $sql = "UPDATE places SET statut = 'libre' WHERE ID = :place_id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':place_id', $stationnement['place_id'], PDO::PARAM_INT);
                $stmt->execute();

                $message = "Véhicule sorti avec succès. La place est maintenant libre.";
            } else {
                $message = "Aucun stationnement trouvé pour ce véhicule ou il est déjà sorti.";
            }
        } catch (PDOException $e) {
            $message = "Erreur : " . $e->getMessage();
        }
    } else {
        $message = "Aucun véhicule spécifié.";
    }
}

// Récupérer les stationnements actifs
$stationnements = []; // Initialisation de la variable $stationnements

try {
    $sql = "SELECT s.ID, s.vehicule_id, s.date_entree, s.date_sortie, p.numero AS place_numero 
            FROM stationnements s
            JOIN places p ON s.place_id = p.ID
            WHERE s.date_sortie IS NULL";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stationnements = $stmt->fetchAll();
} catch (PDOException $e) {
    $message = "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sortir un Véhicule</title>
    <style>
        /* Style général de la page */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 20px auto;
    padding: 20px;
    background: url('../images/sortie.jpg') no-repeat center center/cover;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

h3 {
    color: #333;
    margin-bottom: 10px;
}

.message {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #007bff;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}

button {
    background-color: #28a745;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #218838;
}

button:focus {
    outline: none;
}

form {
    display: inline;
}

p {
    text-align: center;
    font-size: 18px;
    color: #555;
}

/* Style pour les éléments de la page */
.container {
    max-width: 1200px;
}

@media (max-width: 768px) {
    .container {
        width: 90%;
    }

    table th, table td {
        font-size: 14px;
        padding: 8px;
    }

    button {
        padding: 6px 12px;
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <?php include '../header.php'; ?>

    <div class="container">
        <h2>Sortir un Véhicule</h2>
        <?php if ($message) : ?>
            <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <!-- Liste des stationnements actifs -->
        <h3>Vos Stationnements Actifs</h3>
        <?php if (is_array($stationnements) && count($stationnements) > 0) : ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Stationnement</th>
                        <th>Numéro de Place</th>
                        <th>Date d'Entrée</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stationnements as $stationnement) : ?>
                        <tr>
                            <td><?= $stationnement['ID'] ?></td>
                            <td><?= htmlspecialchars($stationnement['place_numero']) ?></td>
                            <td><?= htmlspecialchars($stationnement['date_entree']) ?></td>
                            <td>
                                <!-- Bouton pour sortir le véhicule -->
                                <form action="sortir_vehicule.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="vehicule_id" value="<?= $stationnement['vehicule_id'] ?>">
                                    <button type="submit" onclick="return confirm('Confirmez-vous la sortie de ce véhicule ?');">Sortir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Aucun stationnement actif trouvé.</p>
        <?php endif; ?>
    </div>

    <?php include '../footer.php'; ?>
</body>
</html>
