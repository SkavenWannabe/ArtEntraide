<?php

// ===== INCLUDE ===== //

// importation des classe Annonce, Utilisateur et Reponse
require_once(__DIR__."/Utilisateur.class.php");
require_once(__DIR__."/Annonce.class.php");
require_once(__DIR__."/Categorie.class.php");
require_once(__DIR__."/Reponse.class.php");
require_once(__DIR__."/Message.class.php");
require_once(__DIR__."/Certificateur.class.php");

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
  //recuperer un utilisateur en fonction de son adresse mail
  function getCertifMail(string $email) : Certificateur{
    $req = "SELECT * FROM certificateur WHERE email='$email'";
    $sth = $this->db->query($req);
    $data = $sth->fetchAll(PDO::FETCH_ASSOC)[0];

    $certificateur = new Certificateur($data['id'],$data['email'],$data['password'],$data['nom'],$data['prenom']);
    return $certificateur;
  }

  // verifie si il y a un certificateur associé a l'adresse mail
  function ifCertif(string $email){
    $req = "SELECT * FROM certificateur WHERE email='$email'";
    $sth = $this->db->query($req);
    $return = $sth->fetchAll(PDO::FETCH_COLUMN,0);

    return !empty($return);
  }

  // verifie si il y a un utilisateur associé a l'adresse mail
  function ifUsr(string $email){
    $req = "SELECT * FROM utilisateur WHERE email='$email'";
    $sth = $this->db->query($req);
    $return = $sth->fetchAll(PDO::FETCH_COLUMN,0);

    return !empty($return);
  }

  //Getteur pour tout les utilisateurs
  function getAllUsr() {
    $req = "SELECT * FROM utilisateur";
    $stmt = $this->db->query($req);
    $return = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $return;
  }

  // Getteur du dernier id d'utilisateur
  function getLastIdUti() : int{
    $req = "SELECT MAX(id) FROM utilisateur";
    $stmt = $this->db->query($req);
    $return = $stmt->fetchAll(PDO::FETCH_COLUMN,0);
    return $return[0];
  }

  //recuperer un utilisateur en fonction de son indice
  function getUtilisateur(int $id) : Utilisateur{
    $req = "SELECT * FROM utilisateur WHERE id='$id'";
    $sth = $this->db->query($req);
    $data = $sth->fetchAll(PDO::FETCH_ASSOC)[0];
    if ($data['adresse'] === NULL) {
      $data['adresse'] = '';
    }

    $utilisateur = new Utilisateur($data['id'],$data['nom'],$data['prenom'],$data['email'],$data['password'],$data['adresse'], $data['certif']);
    return $utilisateur;
  }

  //recuperer un utilisateur en fonction de son adresse mail
  function getUtiliMail(string $email) : Utilisateur{
    $req = "SELECT * FROM utilisateur WHERE email='$email'";
    $sth = $this->db->query($req);
    $data = $sth->fetchAll(PDO::FETCH_ASSOC)[0];
    if ($data['adresse'] === NULL) {
      $data['adresse'] = '';
    }

    $utilisateur = new Utilisateur($data['id'],$data['nom'],$data['prenom'],$data['email'],$data['password'],$data['adresse'], $data['certif']);
    return $utilisateur;
  }

  //recuperer le mot de passe d'un utilisateur donné
  // - permet de vérifier/autorisé la connexion
  function getPass(string $email) : string{
    $req = "SELECT password FROM utilisateur WHERE email='$email'";
    $sth = $this->db->query($req);
    $return = $sth->fetchAll(PDO::FETCH_COLUMN,0);

    if (empty($return)) {
      $req = "SELECT password FROM certificateur WHERE email='$email'";
      $sth = $this->db->query($req);
      $return = $sth->fetchAll(PDO::FETCH_COLUMN,0);

      if (empty($return)) {
        return '';
      }else {
        return $return[0];
      }
    } else {
      return $return[0];
    }
  }

  // a vérifier si vraiment nécéssaire
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

  //recuperation d'une annonce avec un id particulier
  function getAnnonce(int $id){
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
    $annonce = new Annonce($data['id'],$data['nom'],$data['description'],$data['adresse'],
                             $data['est_demande'],$data['date_creation'],$data['date_service'],
                             $data['id_createur'],$categorie);
    return $annonce;
  }

  //recuperation des annonces affiché à l'accueil
  function getAnnonceAccueil(){
    $req = "SELECT * FROM annonce where est_active is true ORDER BY id DESC LIMIT 4";
    $sth = $this->db->query($req);
    $datas = $sth->fetchAll(PDO::FETCH_ASSOC);

    //set les valeurs qui peuvent être NULL
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

      //récupération de la catégorie de l'annonce
      $idCat = $data['id_categorie'];
      $req2 = "SELECT * FROM categorie WHERE id='$idCat'";
      $sth2 = $this->db->query($req2);
      $categorie = $sth2->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie")[0];

      $annonce[] = new Annonce($data['id'],$data['nom'],$data['description'],$data['adresse'],
                               $data['est_demande'],$data['date_creation'],$data['date_service'],
                               $data['id_createur'],$categorie);
    }

    return $annonce;
  }

  function getPageRef(int $page, int $pageSize){
    $return = array();
    $ind = ($page -1) * $pageSize;
    $max = $this->getLastIdAnnonce();

    $req = "SELECT * FROM annonce";
    $stmt = $this->db->query($req)->fetchAll();

    for($i = $ind; $i < $ind+$pageSize && $i < $max; $i++){
      $return[] = $stmt[$i][0];
    }

    return $return;
  }

  //recupère une liste d'annonce en fonction d'une categorie - permet de trier les annonces
  function getAnnonceCategorie(string $nomCat){
    $req = "SELECT * FROM annonce, categorie where annonce.est_active is true
                                               AND annonce.id_categorie = categorie.id
                                               AND categorie.nom = '$nomCat'";

    $sth = $this->db->query($req);
    $datas = $sth->fetchAll(PDO::FETCH_ASSOC);

    //set les valeurs qui peuvent être NULL
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

      //récupération de la catégorie de l'annonce
      $idCat = $data['id_categorie'];
      $req2 = "SELECT * FROM categorie WHERE id='$idCat'";
      $sth2 = $this->db->query($req2);
      $categorie = $sth2->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie")[0];

      $annonce[] = new Annonce($data['id'],$data['nom'],$data['description'],$data['adresse'],
                               $data['est_demande'],$data['date_creation'],$data['date_service'],
                               $data['id_createur'],$categorie);
    }

    return $annonce;
  }

//recupère une liste d'annonce correspondant aux critères de recherche (ignore le rayon pour l'instant)
  //Si vous ne voulez pas trier selon un des critères, passez NULL en parametre
  function getAnnonceRecherche(string $motcle, string $nomCat, string $ville, int $rayonKm){

    //Préparation de la requête
    $req = "SELECT * FROM annonce, categorie where annonce.est_active is true
                                               AND annonce.id_categorie = categorie.id";

    if (!is_null($motcle)){
      $req .= " AND LOWER(annonce.nom) like LOWER('%$motcle%')";
    }

    if (!is_null($nomCat)){
      $req .= " AND categorie.nom = '$nomCat'";
    }

    if (!is_null($ville)){
      $req .= " AND annonce.ville = '$ville'";
    }

    //Requête
    $sth = $this->db->query($req);
    $datas = $sth->fetchAll(PDO::FETCH_ASSOC);

    //set les valeurs qui peuvent être NULL
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

      //récupération de la catégorie de l'annonce
      $idCat = $data['id_categorie'];
      $req2 = "SELECT * FROM categorie WHERE id='$idCat'";
      $sth2 = $this->db->query($req2);
      $categorie = $sth2->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie")[0];

      $annonce[] = new Annonce($data['id'],$data['nom'],$data['description'],$data['adresse'],
                               $data['est_demande'],$data['date_creation'],$data['date_service'],
                               $data['id_createur'],$categorie);
    }

    return $annonce;
  }

  //pour l'utilisateur en cours, lui permet de voir ses annonces encore active
  function getSesAnnonce(Utilisateur $utilisateur){
    $id_crea = $utilisateur->getId();
    $req = "SELECT * FROM annonce where est_active is true
                                    AND id_createur = '$id_crea'";
    $sth = $this->db->query($req);
    $datas = $sth->fetchAll(PDO::FETCH_ASSOC);

    //set les valeurs qui peuvent être NULL
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

      //récupération de la catégorie de l'annonce
      $idCat = $data['id_categorie'];
      $req2 = "SELECT * FROM categorie WHERE id='$idCat'";
      $sth2 = $this->db->query($req2);
      $categorie = $sth2->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie")[0];

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
  }

  //permet de recuperer toute les catégories existantes - l'utilisateur peut alors triés suivant ses préférence
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

  //permet de récupérer une liste de tout les indices des messages échangé entre 2 utilisateur pour une annonce
  function getAllIdMessage(int $id_annonce, int $id_repondeur) {
    $req = "SELECT id_message FROM reponse WHERE id_annonce = '$id_annonce'
                                             AND id_repondeur = '$id_repondeur'";
    $stmt = $this->db->query($req);
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN,0);
    return $result;
  }

  //permet de récupérer le contenue d'un message
  function getMessage(int $id){
    $req = "SELECT * FROM message WHERE id = '$id'";
    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Message');
    return $result[0];
  }


  function getSesDiscussion(Utilisateur $utilisateur){
    $inter = array(); // liste intermediaire
    $return = array(); //ensemble des messages à renvoyer

    //recuperation de tout les messages sur ses annonces
    $annonce = $this->getSesAnnonce($utilisateur);
    foreach ($annonce as $value) {
      $idA = $value->getId();

      //recuperation des différentes personnes ayant répondu à cette annonce
      $req = "SELECT id_repondeur FROM reponse where id_annonce = '$idA' group by id_annonce,id_repondeur";
      $sth = $this->db->query($req);
      $id_repondeur = $sth->fetchAll();

      foreach($id_repondeur as $idR){
        //récupération de l'id du dernier message d'une personne ayant répondu à une annonce
        $req = "SELECT max(id_message) FROM reponse
                where id_annonce = '$idA' and id_repondeur = '$idR' Group by id_annonce";
        $stm = $this->db->query($req);
        $id_message = $stm->fetchAll()[0];

        //récupération du message correspondant à l'id
        $req = "SELECT * FROM message where id_message = '$id_message'";
        $stm = $this->db->query($req);
        $message = $stm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Message')[0];

        $auteur = $this->getUtilisateur($message->getIdAuteur());
        $inter[] = $value->getNom();
        $inter[] = $message;
        $inter[] = $auteur->getPrenom();
        $inter[] = $auteur->getNom();
        $return[] = $inter;
      }

    }

    //recuperation de ses messages en tant que reponse a une annonce
    $idU = $utilisateur->getId();
    $req = "SELECT id_annonce FROM reponse where id_repondeur = '$idU' group by id_annonce,id_repondeur";
    $sth = $this->db->query($req);
    $id_annonce = $sth->fetchAll()[0];

    foreach ($id_annonce as $idA) {
      //récupération de l'id du dernier message de sa reponse à une annonce
      $an = $this->getAnnonce($id_annonce[0]);
      if($idU != $an->getIdCreateur()){
        $req = "SELECT max(id_message) FROM reponse
                where id_annonce = '$idA' and id_repondeur = '$idU' Group by id_annonce";
        $stm = $this->db->query($req);
        $id_message = $stm->fetchAll()[0][0];

        //récupération du message correspondant à l'id
        $req = "SELECT * FROM message where id = '$id_message'";
        $stm = $this->db->query($req);
        $message = $stm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Message')[0];

        $auteur = $this->getUtilisateur($message->getIdAuteur());
        $inter[] = $value->getNom();
        $inter[] = $message;
        $inter[] = $auteur->getPrenom();
        $inter[] = $auteur->getNom();
        $return[] = $inter;
      }
    }
    //var_dump($return);
    return $return;
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
  }

  // Mise à jour d'un Utilisateur
  // $utilisateur : l'utilisateur à mettre à jour
  function updateUtilisateur(Utilisateur $utilisateur) {
    $id = $utilisateur->getId();
    $nom = $utilisateur->getNom();
    $prenom = $utilisateur->getPrenom();
    $email = $utilisateur->getEmail();
    $adresse = $utilisateur->getAdresse();
    $password = $utilisateur->getPassword();
    $certif = $utilisateur->getCertif();

    try{
      $sql="UPDATE utilisateur
            SET nom = '$nom',
                prenom = '$prenom',
                email = '$email',
                adresse = '$adresse',
                password = '$password',
                certif = '$certif',
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
  function deleteUtilisateur(int $id) {
    $req = "SELECT * from message WHERE id_auteur='$id'";
    $sth = $this->db->query($req);
    $datas = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($datas as $data) {
      $id_message = $data['id'];
      $sql = "DELETE from reponse WHERE id_message='$id_message'";
      $this->db->exec($sql);
    }

    $sql = "DELETE from message WHERE id_auteur='$id'";
    $this->db->exec($sql);

    $req = "SELECT * from annonce WHERE id_createur='$id'";
    $sth = $this->db->query($req);
    $datas = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($datas as $data) {
      $id_annonce = $data['id'];
      $annonce = $this->getAnnonce($id_annonce);
      $this->deleteAnnonce($annonce);
    }

    //$sql = "DELETE from annonce WHERE id_createur='$id'";
    //$this->db->exec($sql);

    $sql = "DELETE from utilisateur WHERE id='$id'";
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
    if($date_service == ""){
      $date_service = NULL;
    } else {
      $date_service = $annonce->getDateService();
    }
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
    $date_service = $annonce->getDateService(); // /!\ verification nom dans la BDD
    $id_categorie = $annonce->getCategorie()->getId();
    $est_active = $annonce->getEstActive(); // /!\ verification nom dans la BDD
    $est_demande = $annonce->getEstDemande(); // /!\ verification nom dans la BDD

    try{
      $sql="UPDATE annonce
            SET nom = '$nom',
                description= '$description',
                adresse = '$adresse',
                date_service = '$date_service',
                id_categorie = '$id_categorie',
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

    $req = "SELECT * from reponse WHERE id_annonce='$id'";
    $sth = $this->db->query($req);
    $datas = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($datas as $data) {
      $id_message = $data['id_message'];
      $sql = "DELETE from message WHERE id='$id_message'";
      $this->db->exec($sql);
    }

    $sql = "DELETE from reponse WHERE id_annonce='$id'";
    $this->db->exec($sql);

    $sql = "DELETE from annonce WHERE id='$id'";
    $this->db->exec($sql);
  }

  // --- Utilitaire pour les Messages --- //
  function createMessage(Message $message, Reponse $reponse) {
    // Creation du message en base
    $sql = "INSERT INTO Message (id,contenue,date_message,id_auteur)
            values (:id,:contenue,:date_message,:id_auteur)";

    $stmt = $this->db->prepare($sql);

    $id = $message->getId();
    $contenue = $message->getContenue();
    $date_message = $message->getDateMessage();
    $id_auteur = $message->getIdAuteur();

    $stmt->BindParam(':id',$id);
    $stmt->BindParam(':contenue',$contenue);
    $stmt->BindParam(':date_message',$date_message);
    $stmt->BindParam(':id_auteur',$id_auteur);

    $stmt->execute();

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
