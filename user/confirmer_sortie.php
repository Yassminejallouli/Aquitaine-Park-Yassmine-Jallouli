<?php
session_start();

// Vérifier si l'utilisateur est connecté et est un administrateur
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Vérifier le paramètre de statut dans l'URL
$status = isset($_GET['status']) ? $_GET['status'] : '';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Sortie</title>
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
    <?php include '../header.php'; ?>

    <div class="background-main">
        <div class="message-container <?php echo $status === 'success' ? 'success' : 'error'; ?>">
            <h2><?php echo $status === 'success' ? 'Sortie du Véhicule Réussie' : 'Erreur lors de la Sortie'; ?></h2>
            <p>
                <?php
                if ($status === 'success') {
                    echo "La sortie du véhicule a été effectuée avec succès ! La place a été libérée et est maintenant disponible.";
                } else {
                    echo "Une erreur s'est produite lors de la sortie du véhicule. Veuillez réessayer.";
                }
                ?>
            </p>
            <a href="<?php echo $status === 'success' ? 'afficher_places.php' : 'sortir_vehicule.php'; ?>" class="btn-deconnexion">
                <?php echo $status === 'success' ? 'Retourner aux places' : 'Retourner à la page de sortie'; ?>
            </a>
        </div>
    </div>

    <?php include '../footer.php'; ?>
</body>
</html>

