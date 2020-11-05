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

  function __get(string $name){
    switch($name){
      case 'id' : return $this->$name;
        break;
      case 'nom' : return $this->$name;
        break;
      case 'description' : return $this->$name;
        break;
      case 'adresse' : return $this->$name;
        break;
      case 'id_createur' : return $this->$name;
        break;

      default:
        return "NoGet";
        break;
    }
  }

}

?>
