<?php
//Annonce(id, nom, description, adresse, date_creation, date_service, #id_createur, #id_categorie)
//id_createur clef étrangère de Utilisateur, id_categorie clef étrangère de Categorie

// ===== CLASSE ===== //
class Annonce{

  // --- Atribut --- //

  private int $id;

  private string $nom;
  private string $description;

  private string $adresse;

  private string $date_creation;
  private string $date_service;

  private int $id_createur;
  private int $id_categorie;

  // --- Constructeur --- //

  function __construct(int $id, string $nom, string $description, string $adresse, string $date_creation, string $date_service, int $id_createur, int $id_categorie){
    $this->id = $id;

    $this->nom = $nom;
    $this->description = $description;

    $this->adresse = $adresse;

    $this->date_creation = $date_creation;
    $this->date_service = $date_service;

    $this->id_createur = $id_createur;
    $this->id_categorie = $id_categorie;
  }

  // --- Getteurs --- //

  function getId() : int{
    return $this->id;
  }

  function getNom() : string{
    return $this->nom;
  }

  function getDescription() : string{
    return $this->description;
  }

  function getAdresse() : string{
    return $this->adresse;
  }

  function getDateCreation() : string{
    return $this->date_creation;
  }

  function getDateService() : string{
    return $this->date_service;
  }

  function getIdCreateur() : int{
    return $this->id_createur;
  }

  function getIdCategorie() : int{
    return $this->id_categorie;
  }

  // --- Setteur --- //
  function setNom(string $nm) : void{
    $this->nom = $nm;
  }

  function setDescription(string $desc) : void{
    $this->description = $desc;
  }

  function setAdresse(string $ad) : void{
    $this->adresse = $ad;
  }

  function setDateService(string $dService) : void{
    $this->date_service = $dService;
  }
}
?>
