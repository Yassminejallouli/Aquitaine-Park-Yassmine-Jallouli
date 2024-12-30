<?php
session_start();
include('db_connect.php'); // Connexion à la base de données

// Gestion de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nettoyage des données
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Vérifier les informations de connexion
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && $password === $user['password']) { // Comparaison directe du mot de passe
        // Enregistrer les informations de l'utilisateur dans la session
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Rediriger selon le rôle
        if ($user['role'] === 'admin') {
            header("Location: admin/gestion_vehicules.php");
        } else {
            header("Location: user/afficher_places.php");
        }
        exit();
    } else {
        // Message d'erreur générique
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="main-content_login">
        <form class="connexion_login" action="" method="POST">
            <h2 class="login-title">Connexion</h2>
            <?php if (isset($error)): ?>
                <div class="error_login"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            
            <label for="username" class="username-label_login">
                <i class="fas fa-user"></i> Nom d'utilisateur :
            </label>
            <input type="text" name="username" id="username" class="username-input_login" placeholder="Entrez votre nom d'utilisateur" required>

            <label for="password" class="password-label_login">
                <i class="fas fa-lock"></i> Mot de passe :
            </label>
            <input type="password" name="password" id="password" class="password-input_login" placeholder="Entrez votre mot de passe" required>

            <button type="submit" class="submit-btn_login">Se connecter</button>

            <!-- Déplacez le lien ici -->
            <div class="register-link_login">
                Vous n'avez pas de compte ? <a href="register.php" class="register-link-login">Inscrivez-vous ici</a>
            </div>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>


