<?php
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

    <h1>Explorer les offres</h1>

    <section class="">

      <form class="trie" action="../controler/Exploration.ctrl.php" method="post">


        <label for="Ephémère">Ephémère</label>
        <input type="checkbox" name="critere[]" value="Ephémère">

        <label for="Rituel">Rituel</label>
        <input type="checkbox" name="critere[]" value="Rituel">

        <label for="Enchantement">Enchantement</label>
        <input type="checkbox" name="critere[]" value="Enchantement">

        <label for="Créature">Créature</label>
        <input type="checkbox" name="critere[]" value="Créature">

        <label for="PlanesWalker">PlanesWalker</label>
        <input type="checkbox" name="critere[]" value="PlanesWalker">

        <label for="Terrain">Terrain</label>
        <input type="checkbox" name="critere[]" value="Terrain">

        <label for="Rouge">Rouge</label>
        <input type="checkbox" name="critere[]" value="Rouge">

        <label for="Bleu">Bleu</label>
        <input type="checkbox" name="critere[]" value="Bleu">

        <label for="Vert">Vert</label>
        <input type="checkbox" name="critere[]" value="Vert">

        <label for="Noir">Noir</label>
        <input type="checkbox" name="critere[]" value="Noir">

        <label for="Blanc">Blanc</label>
        <input type="checkbox" name="critere[]" value="Blanc">

        <select name="Correspondance">
          <option>Doit correspondre parfaitement</option>
          <option selected>Possède un des attributs</option>
        </select>

        <input type="submit" value="Trier">

      </form>



      <aside class="offre">

        <?php if(isset($offres)) : ?>
          <?php foreach ($offres as $value) : ?>
            <article class="">
              <h3><?=$value->getTitre()?></h3>
            </article>
          <?php endforeach; ?>
        <?php endif; ?>

      </aside>


    </section>
