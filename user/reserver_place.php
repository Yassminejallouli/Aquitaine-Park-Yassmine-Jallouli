<?php
session_start();
include('../db_connect.php'); // Connexion à la base de données

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $user_id = $_SESSION['user_id'];
    $place_id = $_POST['place_id'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];

    // Vérification des données
    if (empty($date_debut) || empty($date_fin)) {
        $_SESSION['error_message'] = "Les dates de début et de fin sont obligatoires.";
        header("Location: reserver_place.php?success=false");
        exit();
    }

    // Préparer la requête d'insertion
    $query = "INSERT INTO reservations (user_id, place_id, date_debut, date_fin, statut) 
              VALUES (:user_id, :place_id, :date_debut, :date_fin, 'en attente')";

    try {
        $stmt = $conn->prepare($query);
        // Lier les paramètres
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':place_id', $place_id);
        $stmt->bindParam(':date_debut', $date_debut);
        $stmt->bindParam(':date_fin', $date_fin);

        // Exécuter la requête
        $stmt->execute();
        header("Location: confirmer_reservation.php?success=true");
        exit();
    } catch(PDOException $e) {
        $_SESSION['error_message'] = "Erreur lors de la réservation : " . $e->getMessage();
        header("Location: reserver_place.php?success=false");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver une Place</title>
    <link rel="stylesheet" href="user.css">
    <script src="validation.js"></script>
</head>
<body>
    <?php include '../header.php'; ?>
    <main class="background-main">
        <div class="main-content_reserver">
            <h1>Réservez votre place</h1>

            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="error-message">
                    <p><?php echo $_SESSION['error_message']; ?></p>
                </div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>

            <form action="reserver_place.php" method="POST" onsubmit="return validateForm()">
                <label for="place_id">ID de la place :</label>
                <input type="number" name="place_id" required placeholder="Entrez l'ID de la place">

                <label for="date_debut">Date de début :</label>
                <input type="datetime-local" name="date_debut" required placeholder="YYYY-MM-DD HH:MM">

                <label for="date_fin">Date de fin :</label>
                <input type="datetime-local" name="date_fin" required placeholder="YYYY-MM-DD HH:MM">

                <button type="submit" class="btn-reserver_reserver">Confirmer la réservation</button>
            </form>
        </div>
    </main>

    <?php include '../footer.php'; ?>
</body>
</html>
