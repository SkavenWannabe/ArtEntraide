<?php
// ============ Controleur qui gère les bouttons du menu ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
// --- recuperation de l'intitule --- //
if ($_POST['intitule'] != '') {
  $nom = htmlentities($_POST['intitule']);
}else{
  $error[] = "L' intitule doit être non nul";
}

// --- recuperation de la categorie --- //
$nomCategorie = htmlentities($_POST['categorie']);

// --- recuperation de la description --- //
if ($_POST['description'] != '') {
  $description = htmlentities($_POST['description']);
}else{
  $error[] = "La description doit être non nul";
}

// --- recuperation du lieu d'execution de l'annonce --- //
if ($_POST['lieu'] != '') {
  $lieu = htmlentities($_POST['lieu']);
}else{
  $lieu = "";
}

// --- récupération date de création --- //
$today = date("y.m.d");

// --- recuperation de la date d'execution de l'annonce --- //
if ($_POST['date'] != '') {
  $dateService = htmlentities($_POST['date']);

  $dateTimestamp1 = strtotime($dateService);
  $dateTimestamp2 = strtotime($today);

  if($dateTimestamp1 < $dateTimestamp2){
    $error[] = "la date ne peut pas être antérieure";
  }
} else {
  $dateService = "";
}

// --- recuperation du type de l'annonce --- //
$est_demande = (htmlentities($_POST['type']) == "demande");
$est_active = true;
// ==== PARTIE USAGE DU MODELE ==== //

session_start();
$user = $_SESSION['user'];

if(!isset($error)){
  $art = new DAO();

  $nomAuteur = $user->getNom();   //récupération du nom de l'auteur

  $categorie = $art->getCategorieNom($nomCategorie);

  // création d'une annonce
  $message = "Votre annonce a bien été créée";
  $idAnnonce = $art->getLastIdAnnonce() + 1;
  $annonce = new Annonce($idAnnonce, $nom, $description, $lieu, $est_demande, $est_active, $today, $dateService, $user, $categorie);
  $art->createAnnonce($annonce);

  //$annonce = $art->getAnnonce((int)$idAnnonce);
}
$connected = $_SESSION['connected'];
$categories = $_SESSION['nomCategories'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

//information nécessaire pour le header
$view->assign('user', $user);
$view->assign('nomCategories', $categories);

if (!isset($error)){
  $view->assign('message', $message);
  $view->assign('nomCategorie', $nomCategorie);
  $view->assign('annonce', $annonce);
  $view->assign('nomAuteur',$nomAuteur);
  $view->assign('connecter', $connected);

  $view->display("annonce.view.php");

} else {
  if(isset($nom)){
    $view->assign('intitule',$nom);
  }
  if(isset($description)){
    $view->assign('description',$description);
  }
  $view->assign('error',$error);
  $view->display("creationAnnonce.view.php");
}
?>
