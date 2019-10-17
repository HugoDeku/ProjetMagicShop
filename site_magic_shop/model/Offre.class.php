<?php


  class Offre{
      private $ref;
      private $titre;
      private $description;
      private $type;
      private $prix;
      private $date;
      private $utilisateur;

      function __construct(){

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

  }










 ?>
