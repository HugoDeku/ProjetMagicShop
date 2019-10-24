<?php
class Utilisateur{
    private $id;
    private $nom;
    private $mail;
    private $mdp;

    function __construct($id = NULL,$nom = NULL,$mail = NULL,$mdp = NULL){
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

    function setId($id){
      $this->id = $id;
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
