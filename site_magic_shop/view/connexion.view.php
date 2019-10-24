<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style_general.css">
    <title>MagicShop - Échange et vente de cartes Magic</title>
  </head>
  <body>

    <header>
      <img src="Images/Logo.png" alt="Logo MagicShop">
      <nav class="Menu">
        <a href="acceuil.view.html"> Acceuil </a>
        <a href="exploration.view.php"> Explorer les offres </a>
        <a href="proposition.view.php"> Proposer une offre </a>
      </nav>
      <div class="Co-Inscription">
        <a href="connexion.view.php" class="Connexion">Connexion</a>
        <a href="inscription.view.php" class="Inscription">Pas de compte ? Inscrit-toi !</a>
      </div>
    </header>

    <form action="acceuil.view.html" method="post">

      <label for="nom">Nom d'Utilisateur : </label>
      <input type="text" name="nom" value="nom" required>

      <label for="mail">Adresse mail : </label>
      <input type="email" name="mail" value="mail" required>

      <label for="mdp">Mot de passe : </label>
      <input type="password" name="mdp" value="mdp" required>

    </form>

  </body>
</html>
