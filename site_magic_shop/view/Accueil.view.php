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
        <a href="../view/Exploration.view.php"> Explorer les offres </a>
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

    <h1>MagicShop - Échange et vente de cartes Magic</h1>

    <p class="explication">Ce site a été crée dans le cadre du projet proposé dans le module "Programmation côté serveur" de l'IUT 2 de l'Université Grenoble-Alpes</p>

    <p>
      Bienvenue sur notre site. <br>
      Vous voulez en savoir plus sur le jeu Magic ? Cliquez <a href="https://magic.wizards.com/fr">ici</a> pour voir leur site. <br>
      Pour voir quels types de produits sont concernés, cliquez <a href="info.view.html" class="LienTexte">ici</a>. <br>
      Pour voir des exemples d'offres, cliquez <a href="info.view.php" class="LienTexte">ici</a>. <br>
    </p>

  </body>
</html>
