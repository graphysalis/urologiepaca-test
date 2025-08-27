<?php
session_start();
require('../private/login_core.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 // Simple login sans base de données
 $user = trim($_POST['username'] ?? '');
 $pass = trim($_POST['password'] ?? '');

 if (checkLogin($user, $pass)) {
  $_SESSION['connecte'] = true;
  header('Location: index.php');
  exit;
 } else {
  $error = "Identifiants invalides";
 }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Connexion</title>
 <link rel="stylesheet" href="/assets/login.css">
</head>

<body>
 <h1>Connexion <br>Espace Administrateur</h1>
 <?php if (!empty($error)): ?>
  <p class="error"><?= htmlspecialchars($error) ?></p>
 <?php endif; ?>

 <form method="post">
  <label for="username">Rentrez votre nom d'utilisateur</label>
  <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" autocomplete="off" required>
  <label for="password">Rentrez votre mot de passe</label>
  <input type="password" name="password" id="password" placeholder="Mot de passe" autocomplete="off" required>
  <button type="submit">Se connecter</button>
 </form>
 <div class="backToSite">
  <a href="./index.php">&#8618; Retour à la page d'accueil</a>
 </div>
</body>

</html>