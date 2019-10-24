<?php

require_once("../model/Utilisateur.class.php");
  session_start();
  if(isset($_SESSION['user'])){
    $user = $_SESSION['user']);
  }

  if(isset($_SESSION['verifNom'])){
    $verifNom = $_SESSION['verifNom']);
  }

  if(isset($_SESSION['verifMail'])){
    $verifMail = $_SESSION['verifMail']);
  }
 ?>

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
        <a href="acceuil.view.php"> Acceuil </a>
        <a href="exploration.view.php"> Explorer les offres </a>
        <a href="proposition.view.php"> Proposer une offre </a>
      </nav>
      <div class="Co-Inscription">
        <a href="connexion.view.php" class="Connexion">Connexion</a>
        <a href="inscription.view.php" class="Inscription">Pas de compte ? Inscrit-toi !</a>
      </div>
    </header>

    <h1>MagicShop - Échange et vente de cartes Magic</h1>

    <p class="explication">Ce site a été crée dans le cadre du projet proposé dans le module "Programmation côté serveur" de l'IUT 2 de l'Université Grenoble-Alpes</p>

    <p>

    </p>

  </body>
</html>
