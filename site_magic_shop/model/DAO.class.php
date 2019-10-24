<?php
  require_once("../model/Offre.class.php");
  require_once("../model/Utilisateur.class.php");

  class DAO {
    private $db;

    private $database = 'sqlite:../DB/base_de_donnees.db';


    function __construct() {
      try{
        $this->db = new PDO($this->database);
      }
      catch(PDOException $e){
        die("Erreur de connexion".$e->getMessage());
      }
    }
//------------------------------------------------------------------------------
    //Table Utilisateur

    function addUser(Utilisateur $user)//tester et valider
    //permet l'ajout d'un nouvelle utilisateur dans la base de données
    {
      //Récupération des attribut de l'objet $user de type Utilisateur
      $idU = $user->getId();
      $nomU = $user->getNom();
      $mailU = $user->getMail();
      $mdpU = $user->getMdp();

      //Création de la requête
      $req = "INSERT INTO Utilisateur VALUES('$idU', '$nomU', '$mailU', '$mdpU')";
      //Éx"cution de la requête
      $this->db->exec($req);
      //var_dump($req);
    }
    function getUser($id) : array//tester est valider
    //permet la récupération de toute les information d'un utilisateur grace à son idea
    {
      $req = "Select * from Utilisateur where id = '$id'";
      $user = $this->db->query($req)->fetchAll(PDO::FETCH_ASSOC)[0];
      return $user;
    }
    function genereID() : int//tester et valider
    //permet la génération d'un nouvelle identifiant en incrémentant le plus grand par 1
    {
      //Création de la reqête
      $req = "SELECT max(id) FROM Utilisateur";
      //stockage de l'éxécution de la reqête
      $maxID = $this->db->query($req)->fetchAll()[0][0];
      //var_dump($maxID)
      //retour de la valeur incrémenter de 1
      return $maxID + 1;
    }
//------------------------------------------------------------------------------
    //Table offre

    function addOffre(Offre $offre)//pas fini
    //permet l'ajout d'une nouvelle offre dans la base de données
    {
      //Récupération des attribut de l'objet $user de type Utilisateur
      $refO = $offre->getRef();
      $titreO = $offre->getTitre();
      $descO = $offre->getDescription();
      $typeO = $offre->getType();
      $prixO = $offre->getPrix();
      $dateO = $offre->getDate();
      $userO = $offre->getUtilisateur();


    }
    function genType(array $types) : int//tester et valider
    //permet de générer la valeur numérique d'une offre en fonction de ses types
    {
      //initialisation du compteur
      $res = 0;
      //création de la requête
      $req = "SELECT * FROM Type";
      //exécution de la reqête stockée
      $toutTypes = $this->db->query($req)->fetchAll();

      foreach ($touttypes as $indice => $ligne) {              //Pour chaque Type de la base
        foreach ($types as $key => $value) {                   //Pour chaque Type de l'offre
          if($ligne['texteCorrespondant'] == $value ){
            //si le type donné par la base appartien à notre array
            //alors on ajoute sa valeur à notre compteur
            $res = $res + $ligne['ref'];
          }
        }
      }
      return $res;
    }
    function getType(int $type) : array
    //renvoie l'ensemble des offre correspondant au type
    {
      $req = "SELECT * FROM Offre WHERE type = '$type'";
      //lance la requête SQLite3
      $offres = $this->db->query($req)->fetchAll(PDO::FETCH_CLASS, "Offre");
      return $offres;
    }
    function getTitre($titre) : array
    //renvoie l'ensemble des offre ayant $titre compris dans leur titre
    {
      $req = "SELECT * FROM Offre WHERE Titre = %'$titre'%";
      $offres = $this->db->querry($req)->fetchAll(PDO::FETCH_ASSOC);
      return $arrayRetour;
    }

  }


 ?>
