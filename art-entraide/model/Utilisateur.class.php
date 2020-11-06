<?php
//Utilisateur(id, nom, prenom, password, adresse)

// ===== CLASSE ===== //
class Utilisateur{

  // --- Atribut --- //

  private int $id:

  private string $nom;
  private string $prenom;

  private int $reputation

  private string $password;

  private string $adresse;


  // --- Constructeur --- //

  function __construct(int $id, string $nom, string $prenom, string $password, string $adresse){
    $this->id = $id;

    $this->nom = $nom;
    $this->prenom = $prenom;

    $this->reputation = 0;

    $this->password = $password;

    $this->adresse = $adresse;
  }

  // --- Getteurs --- //
  // un getteur général pour tout les artibuts

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

  function getPassword() : string {
    return $this->password;
  }

  function getAdresse() : string {
    return $this->adresse;
  }

}
?>
