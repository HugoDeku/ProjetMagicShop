<?php
require_once("../model/DAO.class.php");
require_once("../model/Utilisateur.class.php");
  session_start();
  if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $nom = $user->getNom();
  }
  session_write_close();

  $db = new DAO;
  $offre = $db->getOffreAvecRef($_GET['ref']);

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

  <body>
    <h3><?=$offre->getTitre()?></h3>
    <p>Utilisateur détenant de la carte : <?=$offre->getUtilisateur()?></p>
    <p>Prix : <?=$offre->getPrix()?> €</p>
    <p>Attributs :
    <?php foreach (($offre->getListeType($db->getTableType())) as $val) : ?>
        <?=$val?>
    <?php endforeach ?>
    </p>
    <p>Description : <?=$offre->getDescription()?> </p>
    <p>Date de publication : <?=$offre->getDatePublication()?></p>





  </body>
