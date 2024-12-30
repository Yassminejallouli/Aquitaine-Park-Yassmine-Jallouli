<?php
session_start();
include('../db_connect.php'); // Connexion à la base de données

// Vérifier si l'utilisateur est connecté
$isLoggedIn = isset($_SESSION['user_id']);

try {
    // Récupérer le nombre total de places et le nombre de places libres
    $sql = "SELECT COUNT(*) AS total_places, 
                   SUM(CASE WHEN statut = 'libre' THEN 1 ELSE 0 END) AS places_libres 
            FROM places";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $place_counts = $stmt->fetch();

    $total_places = $place_counts['total_places'];
    $places_libres = $place_counts['places_libres'];

    // Récupérer les places libres
    $sql_libres = "SELECT id, numero FROM places WHERE statut = 'libre'";
    $stmt_libres = $conn->prepare($sql_libres);
    $stmt_libres->execute();
    $places_libres_list = $stmt_libres->fetchAll();
} catch (Exception $e) {
    echo "Erreur lors de la récupération des données : " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir une Place</title>
    <link rel="stylesheet" href="user.css">
</head>

<body>
    <?php include '../header.php'; ?>
    <main class="background-main_affiche">
        <div class="parking-display_affiche">
            <h1>Choisissez une place de parking libre</h1>
            <p>Total de places : <?= htmlspecialchars($total_places) ?></p>
            <p>Places libres : <?= htmlspecialchars($places_libres) ?></p>
            
            <?php if (!$isLoggedIn): ?>
                <div class="not-logged-in">
                    <p><strong>Vous devez vous connecter pour réserver une place.</strong></p>
                    <button type="button" class="btn-reserver_affiche" onclick="window.location.href='../login.php'">
                        Connectez-vous ici
                    </button>
                </div>
            <?php else: ?>
                <?php if ($places_libres_list): ?>
                    <form action="../ajouter_vehicule.php" method="GET">
                        <label for="place_id">Choisissez un numéro de place :</label>
                        <select name="place_id" id="place_id" required>
                            <?php foreach ($places_libres_list as $place): ?>
                                <option value="<?= htmlspecialchars($place['id']) ?>">Place n°<?= htmlspecialchars($place['numero']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn-reserver_affiche">Ajouter un Véhicule</button>
                    </form>

                    <form action="sortir_vehicule.php" method="GET">
                        <button type="submit" class="btn-reserver_affiche">Sortir un Véhicule</button>
                    </form>

                    <form action="reserver_place.php" method="GET">
                        <button type="submit" class="btn-reserver_affiche">Réserver une Place</button>
                    </form>

                <?php else: ?>
                    <p>Aucune place libre disponible actuellement.</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </main>

    <?php include '../footer.php'; ?>
</body>
</html>
