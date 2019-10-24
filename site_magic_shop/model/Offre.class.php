<?php
require_once('../model/Utilisateur.class.php');

  class Offre{
      private $ref;
      private $titre;
      private $description;
      private $type;
      private $prix;
      private $date;
      private $utilisateur;

      function __construct($ref,$titre,$description,$type,$prix,$date,$utilisateur=null){
        $this->ref = $ref;
        $this->titre = $titre;
        $this->description = $description;
        $this->type = $type;
        $this->prix = $prix;
        $this->date = $date;
        $this->utilisateur = $utilisateur;
      }

      function getRef(){
        return $this->ref;
      }

      function getTitre(){
        return $this->titre;
      }

      function getDescription(){
        return $this->description;
      }

      function getType(){
        return $this->type;
      }

      function getPrix(){
        return $this->prix;
      }

      function getDate(){
        return $this->date;
      }

      function getUtilisateur(){
        return $this->utilisateur;
      }

  }

 ?>
