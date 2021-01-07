<?php
// ============ Controleur qui permet de modifier une annonce ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
$idAnnonce = $_POST['idAnnonce'];

// --- recuperation de l'intitule --- //
if ($_POST['intitule'] != '') {
  $nom = $_POST['intitule'];
}else{
  $error[] = "L' intitule doit être non nul";
}

// --- recuperation de la categorie --- //
$nomCategorie = $_POST['categorie'];

// --- recuperation de la description --- //
if ($_POST['description'] != '') {
  $description = $_POST['description'];
}else{
  $error[] = "La description doit être non nul";
}

// --- recuperation du lieu d'execution de l'annonce --- //
if ($_POST['lieu'] != '') {
  $lieu = $_POST['lieu'];
}else{
  $lieu = "";
}

// --- recuperation de la date d'execution de l'annonce --- //
if ($_POST['date'] != '') {
  $dateService = $_POST['date'];

  $dateTimestamp1 = strtotime($dateService);
  $dateTimestamp2 = strtotime($today);

  if($dateTimestamp1 < $dateTimestamp2){
    $error[] = "la date ne peut pas être antérieure";
  }
} else {
  $error[] = "La date doit être non nul";
}

// --- recuperation du type de l'annonce --- //
$est_demande = true; //a recup en post après


// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();

if(!isset($error)){
  $annonce = $art->getAnnonce($idAnnonce);

  $annonce->setNom($nom);
  $annonce->setDescription($description);
  $annonce->setAdresse($lieu);
  $annonce->setDateService($dateService);
  if($annonce->getCategorie()->getNom !== $nomCategorie){
    $annonce->setCategorie($art->getCategorieNom($nomCategorie));
  }

  $art->updateAnnonce($annonce);

  $message = "Annonce bien mise à jour";
}

$user = $_SESSION['user'];
$nomAuteur = $user->getNom();
$nomCategories = $_SESSION['nomCategories'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//information nécessaire pour le header
$view->assign('nomCategories', $nomCategories);
$view->assign('user', $user);

if(!isset($error)){
  $view->assign('nomCategorie', $nomCategorie);
  $view->assign('annonce', $annonce);
  $view->assign('nomAuteur',$nomAuteur);

  $view->assign('message',$message);

  $view->display("annonce.view.php");

} else {
  var_dump($idAnnonce);
  $annonce = $art->getAnnonce($idAnnonce);
  $view->assign('annonce',$annonce);
  $view->assign('error',$error);
  $view->display("modifAnnonce.view.php");
}


?>
