<?php
  require_once("../model/Offre.class.php");
  require_once("../model/Utilisateur.php");

  class DAO {
    private $db;

    private $database = 'sqlite:../DB/magicshop.db';


    function __construct() {
      try{
        $this->db = new PDO($this->database);
      }
      catch(PDOException $e){
        die("Erreur de connexion".$e->getMessage());
      }
    }

    function getType(int $type) : array {
      //renvoie l'ensemble des offre correspondant au type
      $req = "SELECT * FROM Offre WHERE type = '$type'";
      //lance la requête SQLite3

      $offres = $this->db->query($req)->fetchAll(PDO::FETCH_CLASS, "Offre");
    }
  }

 ?>
