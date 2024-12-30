<?php
include('db_connect.php'); // Connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'user'; // Par défaut, le rôle est 'user'

    // Vérification de l'existence du nom d'utilisateur
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        $error = "Ce nom d'utilisateur existe déjà.";
    } else {
        // Insertion dans la base de données avec le mot de passe en clair
        $sql = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // Stockage du mot de passe en clair
        $stmt->bindParam(':role', $role);
        $stmt->execute();

        // Redirection après inscription réussie
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="main-content_login">
        <form class="connexion_login" action="" method="POST">
            <h2 class="login-title">Inscription</h2>
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

            <button type="submit" class="submit-btn_login">S'inscrire</button>

            <!-- Lien vers la page de connexion -->
            <div class="register-link_login">
                Vous avez déjà un compte ? <a href="login.php" class="register-link-login">Connectez-vous ici</a>
            </div>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>

