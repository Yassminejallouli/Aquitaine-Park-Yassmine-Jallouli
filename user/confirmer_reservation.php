<?php
session_start();
include('../db_connect.php'); // Connexion à la base de données

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$success = isset($_GET['success']) && $_GET['success'] == 'true';
$errorMessage = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';

// Réinitialiser le message d'erreur après l'affichage
unset($_SESSION['error_message']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10;
        }
        .background-main {
            background: url('../images/affiche_place.jpg') no-repeat center center/cover;
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
        }

        .message-container.error {
            border-color: #f44336;
            background-color: #fbe9e7;
            color: #f44336;
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
<body>
    <?php include '../header.php'; ?>
    <main class="background-main">
        <div class="message-container <?php echo $success ? 'success' : 'error'; ?>">
            <?php if ($success): ?>
                <h1>Votre réservation a été confirmée avec succès!</h1>
                <p>Si vous souhaitez réserver une autre place, cliquez ci-dessous.</p>
                <a href="afficher_places.php" class="btn-reserver_user">Retour à l'affichage des places</a>
                <a href="../logout.php" class="btn-deconnexion_user">Se déconnecter</a>
            <?php else: ?>
                <h1>Échec de la réservation</h1>
                <p><?php echo $errorMessage ? $errorMessage : 'Veuillez réessayer de réserver.'; ?></p>
                <a href="reserver_place.php" class="btn-reserver_user">Réessayer</a>
            <?php endif; ?>
        </div>
    </main>

    <?php include '../footer.php'; ?>
</body>
</html>
