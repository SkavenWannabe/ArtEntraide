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
  // Getteur pour les utilisateurs
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

  function getIdCreateur(int $id) : int{
    $req = "SELECT id_createur FROM annonce where id = '$id'";
    $stmt = $this->db->query($req);
    $return = $stmt->fetchAll(PDO::FETCH_COLUMN,0);
    return $return[0];
  }


  // Getteur pour les Annonces
  function getLastIdAnnonce() : int{
    $req = "SELECT MAX(id) FROM annonce";
    $stmt = $this->db->query($req);
    $return = $stmt->fetchAll(PDO::FETCH_COLUMN,0);
    return $return[0];
  }

  function getFirstIdAnnonce() : int{
    $req = "SELECT MIN(id) FROM annonce";
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
    //var_dump($data);
    $annonce = new Annonce($data['id'],$data['nom'],$data['description'],$data['adresse'], $data['est_demande'],$data['date_creation'],$data['date_service'],$data['id_createur'],$categorie);

    return $annonce;
  }

  function getAnnonceAccueil(){
    $req = "SELECT * FROM annonce LIMIT 4";
    $sth = $this->db->query($req);
    $datas = $sth->fetchAll(PDO::FETCH_ASSOC);


    foreach ($datas as $data) {
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
      //var_dump($data);
      $annonce[] = new Annonce($data['id'],$data['nom'],$data['description'],$data['adresse'],
                               $data['est_demande'],$data['date_creation'],$data['date_service'],
                               $data['id_createur'],$categorie);
    }

    return $annonce;
  }

  // Getteur pour les categories
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
    //$data = $sth->fetchAll(PDO::FETCH_ASSOC)[0];
    //$cat = new Categorie($data['id'],$data['nom']);
    //return $cat;
  }

  function getAllCategorie(){
    $req = "SELECT * FROM categorie";
    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Categorie');
    return $result;
  }

  // Getteur pour les messages
  function getLastIdMes() : int{
    $req = "SELECT MAX(id) FROM message";
    $stmt = $this->db->query($req);
    $return = $stmt->fetchAll(PDO::FETCH_COLUMN,0);
    return $return[0];
  }

  function getIdMessage(int $id_annonce) : int {
    $req = "SELECT id_message FROM reponse WHERE id = '$id_annonce'";
    $sth = $this->db->query($req);
    $return = $stmt->fetchAll(PDO::FETCH_COLUMN,0);
    return $result[0];
  }

  function getMessage(int $id){
    $req = "SELECT * FROM message WHERE id = '$id'";
    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Message');
    return $result[0];
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
    /*
    $req = "SELECT * FROM Utilisateur where email = '$email'";
    $sth = $this->db->query($req);
    $id = $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Utilisateur');
    var_dump($id);*/
  }

  // Mise à jour d'un Utilisateur
  // $utilisateur : l'utilisateur à mettre à jour
  function updateUtilisateur(Utiliteur $utilisateur) {
    $id = $utilisateur->getId();
    $nom = $utilisateur->getNom();
    $email = $utilisateur->getEmail();
    $adresse = $utilisateur->getAdresse();
    $password = $utilisateur->getPassword();
    $certif = $utilisateur->getCertif();
    $reputation = $utilisateur->getReputation();

    try{
      $sql="UPDATE utilisateur
            SET nom = '$nom',
                email = '$email',
                adresse = '$adresse',
                password = '$password',
                certif = '$certif',
                reputation = '$reputation'
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
    $sql = "INSERT INTO Annonce (id,nom,description,adresse,est_demande,date_creation,date_service,id_createur,id_categorie)
            values (:id,:nom,:description,:adresse,:est_demande,:date_creation,:date_service,:id_createur,:id_categorie)";

    $stmt = $this->db->prepare($sql);

    $id = $annonce->getId();
    $nom = $annonce->getNom();
    $description = $annonce->getDescription();
    $adresse = $annonce->getAdresse();
    $est_demande = $annonce->getEstDemande();
    $date_creation = $annonce->getDateCreation();
    $date_service = $annonce->getDateService();
    $id_createur = $annonce->getIdCreateur();
    $id_categorie = $annonce->getCategorie()->getId();

    $stmt->BindParam(':id',$id);
    $stmt->BindParam(':nom',$nom);
    $stmt->BindParam(':description',$description);
    $stmt->BindParam(':adresse',$adresse);
    $stmt->BindParam(':est_demande',$est_demande);
    $stmt->BindParam(':date_creation',$date_creation);
    $stmt->BindParam(':date_service',$date_service);
    $stmt->BindParam(':id_createur',$id_createur);
    $stmt->BindParam(':id_categorie',$id_categorie);

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
    $est_active = $annonce->getEstActive(); // /!\ verification nom dans la BDD
    $est_demande = $annonce->getEstDemande(); // /!\ verification nom dans la BDD

    try{
      $sql="UPDATE annonce
            SET nom = '$nom',
                description= '$description',
                adresse = '$adresse',
                date_service = '$date_service',
                est_demande = '$est_demande',
                est_active = '$est_active'
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

  function createMessage(Message $message, Reponse $reponse) {
    // Creation du message en base
    $sqlM = "INSERT INTO Message (id,contenue,date_message,id_author)
            values (:id,:contenue,:date_message,:id_author)";

    $stmtM = $this->db->prepare($sqlM);

    $id = $message->getid();
    $contenue = $message->getContenue();
    $date_message = $message->getDateMessage();
    $id_author = $message->getIdAuteur();

    $stmtM->BindParam(':id',$id);
    $stmtM->BindParam(':contenue',$contenue);
    $stmtM->BindParam(':date_message',$date_message);
    $stmtM->BindParam(':id_author',$id_author);

    $stmtM->execute();


    // Creation de la reponse en base
    $sqlR = "INSERT INTO Reponse (id_annonce,id_repondeur,id_message)
            values (:id_annonce,:id_repondeur,:id_message)";

    $stmtR = $this->db->prepare($sqlR);

    $id_annonce = $reponse->getIdAnnonce();
    $id_repondeur = $reponse->getIdRepondeur();
    $id_message = $reponse->getIdMessage();

    $stmtR->BindParam(':id_annonce',$id_annonce);
    $stmtR->BindParam(':id_repondeur',$id_repondeur);
    $stmtR->BindParam(':id_message',$id_message);

    $stmtR->execute();
  }
}

?>
