<?php
//Annonce(id, nom, description, adresse, date_creation, date_service, #id_createur, #id_categorie)
//id_createur clef étrangère de Utilisateur, id_categorie clef étrangère de Categorie
require_once(__DIR__."/Categorie.class.php");

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
  private Categorie $categorie;

  // --- Constructeur --- //

  function __construct( int $id=0,
                        string $nom='nomAnnonce',
                        string $description='descriptionAnnonce',
                        string $adresse='adresse',
                        string $date_creation='01/01/1970',
                        string $date_service='01/01/1970',
                        int $id_createur=0,
                        Categorie $categorie=NULL
                      ){
    $this->id = $id;

    $this->nom = $nom;
    $this->description = $description;

    $this->adresse = $adresse;

    $this->date_creation = $date_creation;
    $this->date_service = $date_service;

    $this->id_createur = $id_createur;
    $this->categorie = $categorie;
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

  function getCategorie() : Categorie{
    return $this->categorie;
  }

  // --- Setteur --- //
  function setNom(string $nom) : void{
    $this->nom = $nom;
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

function getAnnonceErreur() : Annonce{

  $annonceErreur = new Annonce(  -1,
                                'Annonce erreur',
                                'Description erreur : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
                                'Adresse erreur',
                                '00/00/0000',
                                '00/00/0000'
                                -1,
                                NULL
                            );
  return $annonceErreur;

}

?>
