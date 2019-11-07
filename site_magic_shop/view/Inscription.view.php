<?php

require_once("../model/Utilisateur.class.php");
  session_start();
  if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $nom = $user->getNom();
  }
  session_write_close();

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
      <a href="../controler/Proposition.ctrl.php"> Proposer une offre </a>
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

    <?php if(!isset($user)) : ?>
      <!--Si l'utilisateur n'est déjà connecté-->


      <?php if(isset($verifNom)) : ?>
      <!--S'il ya à déja eu une tentative et que le nom n'est pas disponible-->
      <p>Nom pas disponible, veuillez en choisir un autre</p>

      <?php  elseif(isset($verifMail)) : ?>
      <!--S'il ya à déja eu une tentative et que le mail n'est pas disponible-->
      <p>Mail déjà utilisé, vous avez peut-être déjà un compte</p>
      <?php endif; ?>
      <form action="../controler/Inscription.ctrl.php" method="post">

        <fieldset>
          <legend>Formulaire d'inscription</legend>
          <label for="nom"> Pseudo : </label>
          <input type="text" name="nom" required>
          <br>
          <label for="mail">Mail : </label>
          <input type="email" name="mail" required>
          <br>
          <label for="mdp">Mot de passe : </label>
          <input type="password" name="mdp" required>
          <br>
          <label for="confirmmdp">Confirmer votre mot de passe : </label>
          <input type="password" name="confirmmdp" required>
          <br>
          <input type="submit" value="Confirmer">
      </fieldset>
      </form>




    <?php else :  ?>
      <p>Vous êtes déjà connecté au site <?=$user->getNom?></p>
    <?php endif; ?>


  </body>
</html>
