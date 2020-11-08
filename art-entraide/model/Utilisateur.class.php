<?php
//Utilisateur(id, nom, prenom, reputation, certif, email, password, adresse)

// ===== CLASSE ===== //
class Utilisateur{

  // --- Atribut --- //

  private int $id;

  private string $nom;
  private string $prenom;

  private int $reputation;
  private bool $certif;

  private string $email;
  private string $password;

  private string $adresse;


  // --- Constructeur --- //

  function __construct(int $id, string $nom, string $prenom, bool $certif , string $email, string $password, string $adresse){
    $this->id = $id;

    $this->nom = $nom;
    $this->prenom = $prenom;

    $this->reputation = 0;
    $this->certif = $certif;

    $this->email = $email;
    $this->password = $password;

    $this->adresse = $adresse;
  }

  // --- Getteurs --- //

  function getId() : int {
    return $this->id;
  }

  function getNom() : string {
    return $this->nom;
  }

  function getPrenom() : string {
    return $this->prenom;
  }

  function getReputation() : int {
    return $this->reputation;
  }

  function getCertif() : bool {
    return $this->certif;
  }

  function getPassword() : string {
    return $this->password;
  }

  function getEmail() : string {
    return $this->email;
  }

  function getAdresse() : string {
    return $this->adresse;
  }

  // --- Setteurs --- //
  function setNom(string $nm) : void{
    $this->nom = $nm;
  }

  function setEmail(string $email) : void{
    $this->email = $email;
  }

  function setAdresse(string $ad) : void{
    $this->adresse = $ad;
  }

  function setPassword(string $password) : void{
    $this->password = $password; 
  }
}
?>
