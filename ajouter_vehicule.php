<?php
session_start();
include('db_connect.php'); // Connexion à la base de données



// Initialiser la variable $message
$message = '';

// Récupérer les places libres pour afficher dans le formulaire
$sql_places_libres = "SELECT * FROM places WHERE statut = 'libre'";
$stmt_places_libres = $conn->prepare($sql_places_libres);
$stmt_places_libres->execute();
$places_libres = $stmt_places_libres->fetchAll();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Véhicule</title>
    <link rel="stylesheet" href="index.css">
    <script src="ajouter_vehicule.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="ajouter-vehiculee">
        <h1>Ajouter un Nouveau Véhicule</h1>
        <div class="form-ajouter-vehicule-container">
            <div class="form-ajouter-vehicule">
                <h2>Formulaire d'ajout de véhicule</h2>
                
                <?php if ($message) : ?>
                    <div class="message-ajouter-vehicule"><?= htmlspecialchars($message) ?></div>
                <?php endif; ?>

                <form action="confirmer_ajout.php" method="POST" onsubmit="return validerFormulaire()">
                    <div class="form-group">
                        <label for="plaque">Numéro de Plaque :</label>
                        <input type="text" id="plaque" name="plaque" required>
                    </div>
                    <div class="form-group">
                        <label for="proprietaire">Propriétaire :</label>
                        <input type="text" id="proprietaire" name="proprietaire" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Numéro de Téléphone :</label>
                        <input type="text" id="telephone" name="telephone" required>
                    </div>
                    <div class="form-group">
                        <label for="place_id">Place de Stationnement :</label>
                        <select id="place_id" name="place_id" required>
                            <option value="">Choisir une place libre</option>
                            <?php foreach ($places_libres as $place) : ?>
                                <option value="<?= $place['ID'] ?>"><?= $place['numero'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="submit-btn-ajouter-vehicule">Ajouter le Véhicule</button>
                </form>
            </div>
        </div>
    </main>
    
    <?php include 'footer.php'; ?>
</body>
</html>
