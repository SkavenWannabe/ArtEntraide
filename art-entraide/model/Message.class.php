<?php
//Message(id, contenue, date_message, #id_auteur)
//id_auteur clef 2trangère de Utilisateur

// ===== CLASSE ===== //
class Message{

  // --- Atribut --- //

  private int $id;

  private string $contenue;

  private string $date_message;

  private int $id_auteur;

  // --- Constructeur --- //
  function __construct(int $id=0, string $contenue='uneCategorie', string $date_message='uneDate', $id_auteur=1){
    $this->id = $id;

    $this->contenue = $contenue;

    $this->date_message = $date_message;

    $this->id_auteur = $id_auteur;
  }

  // --- Getteurs --- //

  function getId() : int {
    return $this->id;
  }

  function getContenue() : string {
    return $this->contenue;
  }

  function getDateMessage() : string {
    return $this->date_message;
  }

  function getIdAuteur() : int {
    return $this->id_auteur;
  }
}
?>
