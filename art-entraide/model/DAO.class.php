<?php

// ===== INCLUDE ===== //

// importation des classe Annonce, Utilisateur et Reponse
require_once(__DIR__."/Utilisateur.class.php");
require_once(__DIR__."/Annonce.class.php");
require_once(__DIR__."/Categorie.class.php");

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
  function getLastIdUti() : int{
    $req = "SELECT MAX(id) FROM utilisateur";
    $stmt = $this->db->query($req);
    $return = $stmt->fetchAll(PDO::FETCH_COLUMN,0);
    return $return[0];
  }

  function getUtilisateur(int $id) : Utilisateur{
    $req = "SELECT * FROM utilisateur WHERE id='$id'";
    $sth = $this->db->query($req);
    $data = $sth->fetchAll(PDO::FETCH_ASSOC)[0];
    if ($data['adresse'] === NULL) {
      $data['adresse'] = '';
    }

    $utilisateur = new Utilisateur($data['id'],$data['nom'],$data['prenom'],$data['email'],$data['password'],$data['adresse']);
    return $utilisateur;
  }

  function getUtiliMail(string $email) : Utilisateur{
    $req = "SELECT * FROM utilisateur WHERE email='$email'";
    $sth = $this->db->query($req);
    $data = $sth->fetchAll(PDO::FETCH_ASSOC)[0];
    if ($data['adresse'] === NULL) {
      $data['adresse'] = '';
    }

    $utilisateur = new Utilisateur($data['id'],$data['nom'],$data['prenom'],$data['email'],$data['password'],$data['adresse']);
    return $utilisateur;
  }

  function getPass(string $email) : string{
    $req = "SELECT password FROM utilisateur WHERE email='$email'";
    $sth = $this->db->query($req);
    $return = $sth->fetchAll(PDO::FETCH_COLUMN,0);
    if ($return[0] === NULL) {
      return '';
    } else {
      return $return[0];
    }
  }



  function getLastIdAnnonce() : int{
    $req = "SELECT MAX(id) FROM annonce";
    $stmt = $this->db->query($req);
    $return = $stmt->fetchAll(PDO::FETCH_COLUMN,0);
    return $return[0];
  }

  function getAnnonce(int $id) : Annonce{
    $req = "SELECT * FROM annonce WHERE id='$id'";
    $sth = $this->db->query($req);
    $data = $sth->fetchAll(PDO::FETCH_ASSOC)[0];

    if ($data['date_service'] === NULL) {
      $data['date_service'] = '';
    }
    if ($data['description'] === NULL) {
      $data['description'] = '';
    }
    if ($data['adresse'] === NULL) {
      $data['adresse'] = '';
    }

    $idCat = $data['id_categorie'];
    $req2 = "SELECT * FROM categorie WHERE id='$idCat'";
    $sth2 = $this->db->query($req2);
    $categorie = $sth2->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie")[0];

    $annonce = new Annonce($data['id'],$data['nom'],$data['description'],$data['adresse'],$data['date_creation'],$data['date_service'],$data['id_createur'],$categorie);

    return $annonce;
  }



  function getCategorie(int $id) : Categorie{
    $req = "SELECT * FROM categorie WHERE id = '$id'";
    $sth = $this->db->query($req);
    $return = $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");
    return $return[0];
  }

  function getCategorieNom(string $nom) : Categorie{
    $req = "SELECT * FROM categorie WHERE nom = '$nom'";
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
    $sql = "INSERT INTO Utilisateur (id,nom,prenom,email,password,adresse)
            values (:id,:nom,:prenom,:email,:password,:adresse)";

    $stmt = $this->db->prepare($sql);

    $id = $utilisateur->getid();
    $nom = $utilisateur->getNom();
    $prenom = $utilisateur->getPrenom();
    $adresse = $utilisateur->getAdresse();
    $email = $utilisateur->getEmail();
    $password = $utilisateur->getPassword();

    $stmt->BindParam(':id',$id);
    $stmt->BindParam(':nom',$nom);
    $stmt->BindParam(':prenom',$prenom);
    $stmt->BindParam(':email',$email);
    $stmt->BindParam(':password',$password);
    $stmt->BindParam(':adresse',$adresse);

    $stmt->execute();

    $req = "SELECT * FROM Utilisateur where email = '$email'";
    $sth = $this->db->query($req);
    $id = $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Utilisateur');
    var_dump($id);
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
    $sql = "INSERT INTO Annonce (id,nom,description,adresse,date_creation,date_service,id_createur,id_categorie)
            values (:id,:nom,:description,:adresse,:date_creation,:date_service,:id_createur,:id_categorie)";

    $stmt = $this->db->prepare($sql);

    $id = $annonce->getId(); echo "id : " .$id;
    $nom = $annonce->getNom(); echo "  nom : " .$nom;
    $description = $annonce->getDescription(); echo "  description : " .$description;
    $adresse = $annonce->getAdresse();echo "  adresse : " .$adresse;
    $date_creation = $annonce->getDateCreation();echo "  date_creation : " .$date_creation;
    $date_service = $annonce->getDateService();echo "  date_service : " .$date_service;
    $id_createur = $annonce->getIdCreateur();echo "  id_createur : " .$id_createur;
    $id_categorie = $annonce->getCategorie()->getId();echo "  id_categorie : " .$id_categorie;

    $stmt->BindParam(':id',$id);
    $stmt->BindParam(':nom',$nom);
    $stmt->BindParam(':description',$description);
    $stmt->BindParam(':adresse',$adresse);
    $stmt->BindParam(':date_creation',$date_creation);
    $stmt->BindParam(':date_service',$date_service);
    $stmt->BindParam(':id_createur',$id_createur);
    $stmt->BindParam(':id_categorie',$id_categorie);

    $stmt->execute();

    $ann = $this->getAnnonce($id);
    var_dump($ann);
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
