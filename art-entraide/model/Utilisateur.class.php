<?php
//Utilisateur(id, nom, prenom, password, adresse)

// ===== CLASSE ===== //
class Utilisateur{

  // --- Atribut --- //

  private int $id:

  private string $nom;
  private string $prenom;

  private string $password;

  private string $adresse;


  // --- Constructeur --- //

  function __construct(int $id, string $nom, string $prenom, string $password, string $adresse){
    $this->id = $id;

    $this->nom = $nom;
    $this->prenom = $prenom;

    $this->password = $password;

    $this->adresse = $adresse;
  }

  // --- Getteurs --- //
  // un getteur général pour tout les artibuts

  function __get(string $name){
    switch($name){
      case 'id' : return $this->$name;
        break;
      case 'nom' : return $this->$name;
        break;
      case 'prenom' : return $this->$name;
        break;
      case 'password' : return $this->$name;
        break;
      case 'adresse' : return $this->$name;
        break;

      default:
        return "NoGet";
        break;
    }
  }

}
?>
