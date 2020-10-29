<?php

// ===== INCLUDE ===== //

// importation des classe Annonce, Utilisateur et Reponse
require_once(__DIR__."/Utilisateur.class.php");
require_once(__DIR__."/Annonce.class.php");
//require_once(__DIR__."/Reponse.class.php");

// ===== CLASSE ===== //
class DAO{

  // --- Atribut --- //

  // L'objet local PDO de la base de donnée
  private PDO $db;

  // Le type, le chemin et le nom de la base de donnée
  private string $database = 'sqlite:'.__DIR__.'/../data/[nom].db';

  // --- Constructeur --- //

  function __construct(){
    try {
      $this->db = new PDO($this->database);
    } catch (PDOException $e) {
      die("Erreur de connextion à la base de donnée");
    }
  }

  // --- Getteur --- //

  function getUtilisateur(int $id) : Utilisateur{
    $req = "SELECT * FROM utilisateur WHERE id='$id'";

    $sth = $this->db->query($req);
    return $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Utilisateur")[0];
  }


  function getAnnonce(int $id) : Annonce{
    $req = "SELECT * FROM annonce WHERE id='$id'";

    $sth = $this->db->query($req);
    return $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Annonce")[0];
  }

}

?>
