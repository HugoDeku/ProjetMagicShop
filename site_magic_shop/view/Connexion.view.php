<?php
    require_once("../model/Utilisateur.class.php");
    session_start();
    if(isset($_SESSION['user'])){
      $user = $_SESSION['user'];
      $nom = $user->getNom();
    }

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../view/css/style_general.css">
    <title>MagicShop - Échange et vente de cartes Magic</title>
  </head>
  <body>

    <header>
      <img src="../view/Images/Logo.png" alt="Logo MagicShop">
      <nav class="Menu">
        <a href="../view/Accueil.view.php"> Acceuil </a>
        <a href="../controler/Exploration.ctrl.php"> Explorer les offres </a>
        <a href="../view/Proposition.view.php"> Proposer une offre </a>
      </nav>
      <div class="Co-Inscription">


        <?php if(isset($user)) : ?>
          <p>Bonjour : <?=$nom?> </p>
          <a href="../controler/Deconnexion.ctrl.php"> Deconnexion</a>

        <?php else: ?>
          <a href="../view/Connexion.view.php" class="Connexion">Connexion</a>
          <a href="../view/Inscription.view.php" class="Inscription">Pas de compte ? Inscrit-toi !</a>
        <?php endif; ?>
      </div>
    </header>
    <?php if(!isset($_SESSION['user'])) : ?>
    <form action="../controler/Connexion.ctrl.php" method="post">
      <fieldset>
        <legend>Formulaire de connexion</legend>


        <label for="nom">Nom d'Utilisateur ou E-mail : </label>
        <input type="text" name="nom" required> <br>

        <label for="mdp">Mot de passe : </label>
        <input type="password" name="mdp" required><br>
        <?php if(isset($erreur)) :?>
          <p><?=$erreur?></p>
        <?php endif; ?>
        <input type="submit" value="Connexion">
      </fieldset>
    <?php else : ?>
      <p>vous êtes déjà connecté</p>
    <?php endif; ?>

    </form>

  </body>
</html>
