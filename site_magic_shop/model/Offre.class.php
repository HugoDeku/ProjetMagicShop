<?php
require_once('../model/Utilisateur.class.php');

  class Offre{
      private $ref;
      private $titre;
      private $description;
      private $type;
      private $prix;
      private $datePublication;
      private $utilisateur;

      function __construct($ref,$titre,$description,$type,$prix,$datePublication,$utilisateur=null){
        $this->ref = $ref;
        $this->titre = $titre;
        $this->description = $description;
        $this->type = $type;
        $this->prix = $prix;
        $this->datePublication = $datePublication;
        $this->utilisateur = $utilisateur;
      }


      function getListeType($listeTypeDB){
        $ref = $this->getType();
        $retour = array();
        foreach ($listeTypeDB as $key => $value) {
          if($ref >= $value['ref']){
            $ref = $ref-$value['ref'];
            $retour[] = $value['texteCorrespondant'];
          }
        }
        return $retour;
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

      function getDatePublication(){
        return $this->datePublication;
      }

      function getUtilisateur(){
        return $this->utilisateur;
      }

  }

 ?>
