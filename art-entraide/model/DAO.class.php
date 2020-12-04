<?php

// ===== INCLUDE ===== //

// importation des classe Annonce, Utilisateur et Reponse
require_once(__DIR__."/Utilisateur.class.php");
require_once(__DIR__."/Annonce.class.php");
require_once("/home/synntix/db.php");
//require_once(__DIR__."/Reponse.class.php");

// ===== CLASSE ===== //
class DAO{

  // --- Atribut --- //

  // L'objet local PDO de la base de donnée
  private PDO $db;

  // Le type, le chemin et le nom de la base de donnée
  private string $database = 'pgsql:host=localhost;port=5432;dbname=projets3;user=projets3;password='.dbpasswd;

  // --- Constructeur --- //

  function __construct(){
    try {
      $this->db = new PDO($this->database);
    } catch (PDOException $e) {
      die("Erreur de connextion à la base de donnée");
    }
  }

  // --- Getteur --- //
  function getLastId() : int{
    $req = "SELECT max(id) FROM utilisateur";
    $stmt = $this->db->query($req);
    $return = $sth->fetchAll(PDO::FETCH_COLUMN,0);
    return $return[0];
  }

  function getUtilisateur(int $id) : Utilisateur{
    $req = "SELECT * FROM utilisateur WHERE id='$id'";
    $sth = $this->db->query($req);
    $return = $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Utilisateur");
    return $return[0];
  }

  //a voir si nécessaire, utiliser dans login.crtl.php pour le user pour listesAnnonces.crtl.php
  function getNomUtilisateur(int $email) : string{
    $req = "SELECT * FROM utilisateur WHERE email='$email'";
    $sth = $this->db->query($req);
    $return = $sth->fetchAll(PDO::FETCH_COLUMN,0);
    return $return[0];
  }

  function getPass(int $email) : string{
    $req = "SELECT password FROM utilisateur WHERE email='$email'";
    $sth = $this->db->query($req);
    $return = $sth->fetchAll(PDO::FETCH_COLUMN,0);
    return $return[0];
  }

  function getAnnonce(int $id) : Annonce{
    $req = "SELECT * FROM annonce WHERE id='$id'";
    $sth = $this->db->query($req);
    $return = $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Annonce");
    return $return[0];
  }

  function getCategorie(int $id) : Categorie{
    $req = "SELECT * FROM categorie WHERE id = '$id'";
    $sth = $this->db->query($req);
    $return = $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");
    return $return[0];
  }

  function getAllCategorie(){
    $req = "SELECT * FROM categorie";
    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Categorie');
    return $result;
  }

  // --- Utilitaire pour les Utilisateur --- //

  // Sauvegarde d'un utilisateur dans la base de données
  // $utilisateur : l'utilisateur à sauvegarder
  function createUtilisateur(Utilisateur $utilisateur) {
    $sql = "INSERT INTO Annonce (id,nom,prenom,reputation,certif,email,password,adresse)
            values (:id,:nom,:prenom,:reputation,:certif,:email,:password,:adresse)";

    $stmt = $this->db->prepare($sql);

    $id = $utilisateur->getId(); $nom = $utilisateur->getNom();
    $prenom = $utilisateur->getPrenom(); $adresse = $utilisateur->getAdresse();
    $reputation = $utilisateur->getReputation(); $certif = $utilisateur->getCertif();
    $email = $utilisateur->getEmail(); $password = $utilisateur->getPassword();

    $stmt->BindParam(':id',$id); $stmt->BindParam(':nom',$nom);
    $stmt->BindParam(':prenom',$prenom); $stmt->BindParam(':adresse',$adresse);
    $stmt->BindParam(':reputation',$reputation); $stmt->BindParam(':certif',$certif);
    $stmt->BindParam(':email',$email); $stmt->BindParam(':password',$password);

    $stmt->execute();
  }

  // Mise à jour d'un Utilisateur
  // $utilisateur : l'utilisateur à mettre à jour
  function updateUtilisateur(Utiliteur $utilisateur) {
    $id = $utilisateur->getId();
    $nom = $utilisateur->getNom();
    $email = $utilisateur->getEmail();
    $adresse = $utilisateur->getAdresse();
    $password = $utilisateur->getPassword();

    try{
      $sql="UPDATE utilisateur
            SET nom = '$nom',
                email = '$email',
                adresse = '$adresse',
                password = '$password'
            WHERE id = '$id'";

      $stmt = $this->db->prepare($sql);
      $stmt->execute();
      echo $stmt->rowCount() . " records UPDATED successfully";

    }catch(PDOException $e){
      echo $sql ."<br>" . $e->getMessage();
    }
  }

  // Suppression d'un Utilisateur
  // $utilisateur : l'utilisateur à supprimer
  function deleteUtilisateur(Utilisateur $utilisateur) {
    $id = $utilisateur->getId();
    $sql = "DELETE from utilisateur WHERE id='$id'";
    //$this->lastQuery = $sql;
    $this->db->exec($sql);
  }

  // --- Utilitaire pour les Annonces --- //

  // Sauvegarde d'une annonce dans la base de données
  // $annonce : l'annonce à sauvegarder
  function createAnnonce(Annonce $annonce) {
    $sql = "INSERT INTO Annonce (id,nom,desrciption,adresse,date_creation,date_service,id_createur,id_categorie)
            values (:id,:nom,:desrciption,:adresse,:date_creation,:date_service,:id_createur,:id_categorie)";

    $stmt = $this->db->prepare($sql);

    $id = $annonce->getId(); $nom = $annonce->getNom();
    $description = $annonce->getDescription(); $adresse = $annonce->getAdresse();
    $date_creation = $annonce->getDateCreation(); $date_service = $annonce->getDateService();
    $id_createur = $annonce->getIdCreateur(); $id_cat = $annonce->getIdCategorie()->getId();

    $stmt->BindParam(':id',$id); $stmt->BindParam(':nom',$nom);
    $stmt->BindParam(':description',$description); $stmt->BindParam(':adresse',$adresse);
    $stmt->BindParam(':date_creation',$date_creation); $stmt->BindParam(':date_service',$date_service);
    $stmt->BindParam(':id_createur',$id_createur); $stmt->BindParam(':id_categorie',$id_categorie);

    $stmt->execute();
  }

  // Mise à jour d'une annonce
  // $annonce : l'annonce à mettre à jour
  function updateAnnonce(Annonce $annonce) {
    $id = $annonce->getId();
    $nom = $annonce->getNom();
    $description = $annonce->getDescription();
    $adresse = $annonce->getAdresse();
    //$date_creation = $annonce->getDateCreation();
    $date_service = $annonce->getDateService(); // /!\ verification nom dans la BDD
    //$id_createur = $annonce->getIdCreateur();
    //$id_categorie = $annonce->getIdCategorie();

    try{
      $sql="UPDATE annonce
            SET nom = '$nom',
                description= '$description',
                adresse = '$adresse',
                date_service = $date_service
            WHERE id = '$id'";

      $stmt = $this->db->prepare($sql);
      $stmt->execute();
      echo $stmt->rowCount() . " records UPDATED successfully";

    }catch(PDOException $e){
      echo $sql ."<br>" . $e->getMessage();
    }
  }

  // Suppression d'une annonce
  // $annonce : l'annonce à supprimer
  function deleteAnnonce(Annonce $annonce) {
    $id = $annonce->getId();
    $sql = "DELETE from annonce WHERE id='$id'";
    //$this->lastQuery = $sql;
    $this->db->exec($sql);
  }


}

?>
