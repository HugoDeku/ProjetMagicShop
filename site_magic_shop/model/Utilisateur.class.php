<?php
class Utilisateur{
    private $id;
    private $nom;
    private $mail;
    private $mdp;

    function __construct($id,$nom,$mail,$mdp){
      $this->id = $id;
      $this->nom = $nom;
      $this->mail = $mail;
      $this->mdp = $mdp;
    }

    function getId(){
      return $this->id;
    }

    function getNom(){
      return $this->nom;
    }

    function getMail(){
      return $this->mail;
    }

    function getMdp(){
      return $this->mdp;
    }


}



 ?>
