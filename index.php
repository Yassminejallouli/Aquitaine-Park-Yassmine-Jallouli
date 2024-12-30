<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquitaine Park</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="main-banner_index">
        <div class="banner-content_index">
            <h1>PARKING BORDEAUX-MÉRIGNAC, PROCHE AÉROPORT</h1>
            <h2>AQUITAINE PARK</h2>
            <p>Navettes offertes</p>
            <div class="rating_index">
                <p>4.7 ★★★★★ sur 368 avis</p>
            </div>
            <form action="user/afficher_places.php" method="POST" class="search-form_index">
                <input type="date" name="date_debut" required>
                <input type="date" name="date_fin" required>
                <button type="submit">Rechercher</button>
            </form>
        </div>
        <section class="advantages_index">
            <div class="advantage-box_index">
                <h3>🔒 PARKING SÉCURISÉ</h3>
                <p>Notre parking clôturé et couvert est équipé d’un système de vidéo-surveillance et d’une présence humaine 24h/24.</p>
            </div>
            <div class="advantage-box_index">
                <h3>✈️ PROCHE DE L’AÉROPORT</h3>
                <p>À 3 km de l’Aéroport Bordeaux, nous vous offrons des navettes aller/retour, 24h/24, 7j/7.</p>
            </div>
            <div class="advantage-box_index">
                <h3>💰 ÉCONOMIQUE, TOUTE L’ANNÉE</h3>
                <p>Ouvert tous les jours 24h/24, nous proposons des tarifs avantageux : jusqu’à moins 50% toute l’année !</p>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
