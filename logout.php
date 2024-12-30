<?php
session_start();

// Vérification si une session est active
if (isset($_SESSION['user_id'])) {
    // Détruire les variables de session
    session_unset();

    // Détruire la session
    session_destroy();

    // Supprimer le cookie de session si existant
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/'); // Expirer le cookie
    }

    // Régénérer l'ID de session pour éviter la fixation de session
    session_regenerate_id(true);

    $status = 'success'; // Déconnexion réussie
} else {
    $status = 'error'; // Pas de session active
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10;
        }
        .background-main {
            background: url('images/login.jpg') no-repeat center center/cover;
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
<body>
    <?php include 'header.php'; ?>

    <div class="background-main">
        <div class="message-container <?php echo $status === 'success' ? 'success' : 'error'; ?>">
            <h2><?php echo $status === 'success' ? 'Déconnexion réussie' : 'Erreur de déconnexion'; ?></h2>
            <p>
                <?php
                if ($status === 'success') {
                    echo "Vous avez été déconnecté avec succès. Vous pouvez maintenant vous reconnecter.";
                } else {
                    echo "Il n'y avait pas de session active. Veuillez réessayer.";
                }
                ?>
            </p>
            <a href="login.php" class="btn-deconnexion">
                <?php echo $status === 'success' ? 'Se reconnecter' : 'Retour à la page de connexion'; ?>
            </a>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
