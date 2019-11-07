<?php
  require_once("../model/Offre.class.php");
  require_once("../model/Utilisateur.class.php");

  class DAO {
    private $db;

    private $path = '../model/DB/base_de_donnees.db';


    function __construct() {
      try{
        $this->db = new PDO('sqlite:'.$this->path);
      }
      catch(PDOException $e){
        die("Erreur de connexion : ".$e->getMessage());
      }
    }
//------------------------------------------------------------------------------
    //Table Utilisateurstring

    function addUser(Utilisateur $user)
    //permet l'ajout d'un nouvelle utilisateur dans la base de données
    {
      //Récupération des attribut de l'objet $user de type Utilisateur
      $nomU = $user->getNom();
      $mailU = $user->getMail();
      $mdpU = $user->getMdp();

      //Création de la requête
      $req = "INSERT INTO Utilisateur VALUES('$nomU', '$mailU', '$mdpU')";
      //Éx"cution de la requête
      $this->db->exec($req);
      //var_dump($req);
    }
    function getUser($nom)
    //permet la récupération de toute les information d'un utilisateur grace à son idea
    {
      $req = "Select * from Utilisateur where nom = '$nom'";
      $user = $this->db->query($req)->fetchAll(PDO::FETCH_ASSOC)[0];
      return $user;
    }

    function getUserParMail($mail)//tester est valider
    //permet la récupération de toute les information d'un utilisateur grace à son idea
    {
      $req = "Select * from Utilisateur where mail = '$mail'";
      $user = $this->db->query($req)->fetchAll(PDO::FETCH_ASSOC)[0];
      return $user;
    }

//------------------------------------------------------------------------------
    //Table offre

    function addOffre(Offre $offre)
    //permet l'ajout d'une nouvelle offre dans la base de données
    {
      //Récupération des attribut de l'objet $user de type Utilisateur
      $refO = $offre->getRef();
      $titreO = $offre->getTitre();
      $descO = $offre->getDescription();
      $typeO = $offre->getType();
      $prixO = $offre->getPrix();
      $dateO = $offre->getDatePublication();
      $userO = $offre->getUtilisateur();
      $req = "INSERT INTO Offre VALUES(
        '$refO',
        '$titreO',
        '$descO',
        '$typeO',
        '$prixO',
        '$dateO',
        '$userO')";
      $this->db->exec($req);
    }
    function genType(array $types) : int
    //permet de générer la valeur numérique d'une offre en fonction de ses types
    {
      //initialisation du compteur
      $res = 0;
      $toutTypes = $this->getTableType();

      foreach ($toutTypes as $indice => $ligne) {              //Pour chaque Type de la base
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
      $types = $this->db->query($req)->fetchAll(PDO::FETCH_ASSOC);
      $arrayRetour = array();
      foreach ($types as $key => $value) {
        $arrayRetour[] = new Offre($value['ref'],$value['titre'],$value['description'],$value['type'],$value['prix'],$value['datePublication'],$value['utilisateur']);
      }
      return $arrayRetour;
    }

    function getTableType() : array
    //Permet de retourner tous les types existants
    {
      $req = "SELECT * FROM Type ORDER BY ref DESC";
      $types = $this->db->query($req)->fetchAll();
      return $types;
    }

    function getOffres() : array
    //Permet de retourner toutes les offres
    {
      $req = "SELECT * FROM Offre";
      $types = $this->db->query($req)->fetchAll(PDO::FETCH_ASSOC);
      $arrayRetour = array();
      foreach ($types as $key => $value) {
        $arrayRetour[] = new Offre($value['ref'],$value['titre'],$value['description'],$value['type'],$value['prix'],$value['datePublication'],$value['utilisateur']);
      }
      return $arrayRetour;
    }



    function getTitre($titre) : array
    //renvoie l'ensemble des offre ayant $titre compris dans leur titre
    {
      $req = "SELECT * FROM Offre WHERE Titre = %'$titre'%";
      $offres = $this->db->querry($req)->fetchAll(PDO::FETCH_ASSOC);
      return $arrayRetour;
    }
    function genRef() : int //a tester
    //permet la génération d'une nouvelle référence en incrémentant la plus grande référence par 1
    {
      $req = "SELECT max(ref) FROM Offre";
      $maxID = $this->db->query($req)->fetchAll()[0][0];
      if($maxID == NULL){
        $maxID = 0;
      }
      return  $maxID + 1;
    }


  function verifDispoNom($nom) : bool
  //Vérifie si le nom d'utilisateur est dispo
  {
    $req = "SELECT count(*) FROM Utilisateur WHERE nom = \"$nom\" ";
    $nb = $this->db->query($req)->fetchAll()[0][0];
    return ($nb == 0);
  }

  function verifDispoMail($mail) : bool
  //Vérifie si l'@ email est dispo
  {
    $req = "SELECT count(*) FROM Utilisateur WHERE mail = \"$mail\" ";
    $nb = $this->db->query($req)->fetchAll()[0][0];
    return ($nb == 0);
  }

  function getOffreAvecRef($ref)
  //Permet de sortir une Offre par rapport à une référence
  {
    $req = "SELECT * FROM Offre WHERE ref = \"$ref\" ";
    $value = $this->db->query($req)->fetchAll()[0];
    $retour = new Offre($value['ref'],$value['titre'],$value['description'],$value['type'],$value['prix'],$value['datePublication'],$value['utilisateur']);
    return $retour;
  }
}

 ?>
