<?php
//Reponse(#id_annonce, #id_repondeur, #id_message)
//id_annonce clef étrangère de Annonce, id_repondeur clef étrangère de Utilisateur, id_message clef étrangère de Message

// ===== CLASSE ===== //
class Reponse{

  // --- Atribut --- //

  private int $id_annonce;
  private int $id_repondeur;

  private int $id_message;

  // --- Constructeur --- //
  function __construct(int $id_annonce, int $id_repondeur, int $id_message){
    $this->id_annonce = $id_annonce;
    $this->id_repondeur = $id_repondeur;

    $this->id_message = $id_message;
  }

  // --- Getteurs --- //

  function getIdAnnonce() : int {
    return $this->id_annonce;
  }

  function getIdRepondeur() : int {
    return $this->id_repondeur;
  }

  function getIdMessage() : int {
    return $this->id_message;
  }
}
?>
