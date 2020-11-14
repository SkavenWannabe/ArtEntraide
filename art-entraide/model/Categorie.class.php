<?php
//Categorie(id, nom)

// ===== CLASSE ===== //

class Categorie {

  // --- Atribut --- //

  private int $id;

  private string $nom;

  // --- Constructeur --- //

  function __construct(int $id=0, string $nom='nomCategorie') {
    $this->id = $id;

    $this->nom = $nom;
  }

  // --- Getteurs --- //

  function getId() : int {
    return  $this->id;
  }

  function getNom() : string {
    return $this->nom;
  }
}
