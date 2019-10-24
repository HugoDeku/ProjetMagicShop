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
    //Table Utilisateur
    function addUser(Utilisateur $user){
      $idU = $user->getId();
      $nomU = $user->getNom();
      $mailU = $user->getMail();
      $mdpU = $user->getMdp();

      $req = "INSERT INTO Utilisateur VALUES('$idU', '$nomU', '$mailU', '$mdpU')";
      $this->db->exec($req);
      //var_dump($req);
    }
    function getUser($id) : array{
      $req = "Select * from Utilisateur where id = '$id'";
      $user = $this->db->query($req)->fetchAll(PDO::FETCH_ASSOC)[0];
      return $user;
    }

    function genereID() : int{
      $req = "SELECT max(id) FROM Utilisateur";
      $maxID = $this->db->query($req)->fetchAll();
      //var_dump($maxID);

      return $maxID[0][0] + 1;
    }

    //Table offre
    function genRef(array $types) : int{
      $res = 0;
      $req = "SELECT * FROM Type";
      $tt = $this->db->query($req)->fetchAll();

      foreach ($tt as $indice => $ligne) {
        foreach ($types as $key => $value) {
          if($ligne['texteCorrespondant'] == $value ){
            $res = $res + $ligne['ref'];
          }
        }
      }
      return $res;
    }

    function getType(int $type) : array {
      //renvoie l'ensemble des offre correspondant au type
      $req = "SELECT * FROM Offre WHERE type = '$type'";
      //lance la requête SQLite3
      $offres = $this->db->query($req)->fetchAll(PDO::FETCH_CLASS, "Offre");
      return $offres;
    }
    function getTitre($titre) : array {
      $req = "SELECT * FROM Offre";
      $offres = $this->db->querry($req)->fetchAll(PDO::FETCH_ASSOC);
      $arrayRetour = array();
      foreach ($offres as $array) {
        if(stristr( $array['titre'], $titre)){
          $arrayRetour[] = $array['titre'];
        }
      }
      return $arrayRetour;
    }

  }


 ?>
