<?php

require_once("../model/Utilisateur.class.php");
  session_start();
  if(isset($_SESSION['user'])){
    $user = $_SESSION['user']);
  }

  if(isset($_SESSION['verifNom'])){
    $verifNom = $_SESSION['verifNom'];
    $_SESSION['verifNom'] = NULL;
  }

  if(isset($_SESSION['verifMail'])){
    $verifMail = $_SESSION['verifMail'];
    $_SESSION['verifMail'] = NULL;
  }
  session_write_close();
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


    <?php if(!isset($user)) : ?>
      //Si l'utilisateur est déjà connecté


      <?php elseif(isset($verifNom) && $verifNom == false) : ?>
      //S'il ya à déja eu une tentative et que le nom n'est pas disponible
      <p>Nom pas disponible, veuillez en choisir un autre</p>

      <?php  elseif(isset($verifMail) && $verifMail == false) : ?>
      //S'il ya à déja eu une tentative et que le mail n'est pas disponible
      <p>Mail déjà utilisé, vous avez peut-être déjà un compte</p>
      <?php endif; ?>
      <form action="../controler/Inscription.ctrl.php" method="post">

        <label for="nom"> Pseudo : </label>
        <input type="text" name="nom" required>

        <label for="mail">Mail : </label>
        <input type="email" name="mail" required>

        <label for="mdp">Mot de pass : </label>
        <input type="password" name="mdp" required>

      </form>




    <?php else :  ?>
      <p>Vous êtes déjà connecté au site <?=$user->getNom?></p>
    <?php endif; ?>


  </body>
</html>
