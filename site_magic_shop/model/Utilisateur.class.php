<?php
class Utilisateur{
    private $nom;
    private $mail;
    private $mdp;

    function __construct($nom = NULL,$mail = NULL,$mdp = NULL){
      $this->nom = $nom;
      $this->mail = $mail;
      $this->mdp = $mdp;
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


    function setNom($nom){
      $this->nom = $nom;
    }

    function setMail($mail){
      $this->mail = $mail;
    }

    function setMdp($mdp){
      $this->mdp = $mdp;
    }




}



 ?>
