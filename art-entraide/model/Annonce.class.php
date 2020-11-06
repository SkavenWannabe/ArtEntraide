<?php
//Annonce(id, nom, description, adresse, #id_createur) id_createur clef étrangère de Utilisateur

// ===== CLASSE ===== //
class Annonce{

  // --- Atribut --- //

  private int $id:

  private string $nom;
  private string $description;

  private string $adresse;

  private int $id_createur;

  // --- Constructeur --- //

  function __construct(int $id, string $nom, string $description, string $adresse, int $id_createur){
    $this->id = $id;

    $this->nom = $nom;
    $this->description = $description;

    $this->adresse = $adresse;

    $this->id_createur = $id_createur;
  }

  // --- Getteurs --- //
  // un getteur général pour tout les artibuts
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

  function getIdCreateur() : int{
    return $this->id_createur; 
  }

?>
