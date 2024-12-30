<?php
// Démarrer la session si elle n'est pas déjà commencée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si l'utilisateur est connecté (par exemple, en vérifiant la session)
$isLoggedIn = isset($_SESSION['user_id']); // Assurez-vous que 'user_id' est défini lors de la connexion
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Styles généraux */
        body {
            font-family: 'Roboto', sans-serif;
        }

        /* Barre de contact */
        .header_header {
            background: #ececec;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }

        .btn-reservation_header {
            background-color: #052038;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        /* Menu principal */
        .menu_header {
            background-color: #052038;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .menu_header .logo_header h2 {
            color: #fff;
            margin: 0;
        }

        .menu_header ul {
            list-style: none;
            display: flex;
            padding: 0;
        }

        .menu_header ul li {
            margin: 0 15px;
        }

        .menu_header ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header class="header_header">
        <div class="contact_header">
            <span>📞 05 57 65 95 95 | ✉ contact@aquitaine-park.com | ⏰ 24/24 - 7/7</span>
        </div>
        <div class="connexion_header">
            <?php if ($isLoggedIn): ?>
                <!-- Bouton de déconnexion si l'utilisateur est connecté -->
                <a href="logout.php" class="btn-reservation_header">Déconnexion</a>
            

            <?php else: ?>
                <!-- Bouton de connexion si l'utilisateur n'est pas connecté -->
                <a href="login.php" class="btn-reservation_header">Connexion</a>
            <?php endif; ?>
        </div>
    </header>

    <nav class="menu_header">
        <div class="logo_header">
            <h2>AQUITAINE PARK</h2>
        </div>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="FAQ.html">FAQ</a></li>
            <li><a href="contact.html">Contacts</a></li>
        </ul>
    </nav>
</body>
</html>
