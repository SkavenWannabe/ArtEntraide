<?php
//Certificateur(id, email, password, nom, prenom)

// ===== CLASSE ===== //
class Certificateur{

  // --- Atribut --- //

  private int $id;

  private string $email;
  private string $password;

  private string $nom;
  private string $prenom;

  // --- Constructeur --- //

  function __construct(int $id=0, string $email='unEmail', string $password='unPass', string $nom='nomCertificateur', string $prenom='prenomCertificateur'){
    $this->id = $id;

    $this->email = $email;
    $this->password = $password;

    $this->nom = $nom;
    $this->prenom = $prenom;
  }

  // --- Getteurs --- //

  function getId() : int {
    return $this->id;
  }

  function getPassword() : string {
    return $this->password;
  }

  function getEmail() : string {
    return $this->email;
  }

  function getNom() : string {
    return $this->nom;
  }

  function getPrenom() : string {
    return $this->prenom;
  }

  // --- Setteurs --- //
  function setId(int $id) : void{
    $this->id = $id;
  }

  function setEmail(string $email) : void{
    $this->email = $email;
  }

  function setPassword(string $password) : void{
    $this->password = $password;
  }

  function setNom(string $nom) : void{
    $this->nom = $nom;
  }

  function setPrenom(string $prenom) : void{
    $this->prenom = $prenom;
  }
}
?>
