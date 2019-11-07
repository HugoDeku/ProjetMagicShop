<?php
require_once("../model/Utilisateur.class.php");
session_start();
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
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
        <a href="../controler/Proposition.ctrl.php"> Proposer une offre </a>
      </nav>
      <div class="Co-Inscription">


        <?php if(isset($user)) : ?>
          <p>Bonjour : </p>
          <a href="../controler/Deconnexion.ctrl.php"> Deconnexion</a>

        <?php else: ?>
          <a href="../view/Connexion.view.php" class="Connexion">Connexion</a>
          <a href="../view/Inscription.view.php" class="Inscription">Pas de compte ? Inscrit-toi !</a>
        <?php endif; ?>
      </div>
    </header>

    <body>

      <h1>Proposer une offre</h1>

      <form class="form_proposition" action="PropositionAjouter.ctrl.php" method="post">

        <div class="combo_label_input">
          <label for="titre">Titre : </label>
          <input type="text" name="titre" required>
        </div>

        <div class="combo_label_input">
          <label for="description">Description : </label>
          <textarea name="description" rows="8" cols="23" required></textarea>
        </div>

        <div class="combo_label_input">
          <label for="prix">Prix voulue en € : </label>
          <input type="number" step="0.01" name="prix" required>
        </div>

        <div class="combo_label_input">
          <label for="Ephémère">Ephémère</label>
          <input type="checkbox" name="critere[]" value="Ephémère">
        </div>

        <div class="combo_label_input">
          <label for="Rituel">Rituel</label>
          <input type="checkbox" name="critere[]" value="Rituel">
        </div>

        <div class="combo_label_input">
          <label for="Enchantement">Enchantement</label>
          <input type="checkbox" name="critere[]" value="Enchantement">
        </div>

        <div class="combo_label_input">
          <label for="Créature">Créature</label>
          <input type="checkbox" name="critere[]" value="Créature">
        </div>

        <div class="combo_label_input">
          <label for="PlanesWalker">PlanesWalker</label>
          <input type="checkbox" name="critere[]" value="PlanesWalker">
        </div>

        <div class="combo_label_input">
          <label for="Terrain">Terrain</label>
          <input type="checkbox" name="critere[]" value="Terrain">
        </div>

        <div class="combo_label_input">
          <label for="Rouge">Rouge</label>
          <input type="checkbox" name="critere[]" value="Rouge">
        </div>

        <div class="combo_label_input">
          <label for="Bleu">Bleu</label>
          <input type="checkbox" name="critere[]" value="Bleu">
        </div>

        <div class="combo_label_input">
          <label for="Vert">Vert</label>
          <input type="checkbox" name="critere[]" value="Vert">
        </div>

        <div class="combo_label_input">
          <label for="Noir">Noir</label>
          <input type="checkbox" name="critere[]" value="Noir">
        </div>

        <div class="combo_label_input">
          <label for="Blanc">Blanc</label>
          <input type="checkbox" name="critere[]" value="Blanc">
        </div>

        <button type="submit" class="prop_butt">Proposer</button>

      </form>














    </body>
