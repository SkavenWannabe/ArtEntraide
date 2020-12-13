<?php
// ============ Controleur qui gère les bouttons du menu ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
// --- recuperation de l'intitule --- //
if ($_POST['intitule'] != '') {
  $nom = $_POST['intitule'];
}else{
  $error[] = "L' intitule doit être non nul";
}

// --- recuperation de la categorie --- //
$nomCategorie = $_POST['categorie'];
$nomCategorie = 'Location'; // en attendant que se soit correctement fait côté IHM

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
  $error[] = "Le lieu doit être non nul";
}

// --- récupération date de création --- //
$today = date("m.d.y");

// --- recuperation de la date d'execution de l'annonce --- //
if ($_POST['date'] != '') {
  $dateService = $_POST['date'];
  if($dateService < $today){
    $error[] = "la date ne peu pas être antérieur";
  }
} else {
  $error[] = "La date doit être non nul";
}

// ==== PARTIE USAGE DU MODELE ==== //

session_start();
$user = $_SESSION['user']; var_dump($user);

if(!isset($error)){
  $art = new DAO();

  $idCreateur = $user->getId();
  $nomAuteur = $user->getNom();   //récupération du nom de l'auteur

  $categorie = $art->getCategorieNom($nomCategorie);

  // création d'une annonce
  $idAnnonce = $art->getLastIdAnnonce() + 1; 
  $annonce = new Annonce($idAnnonce, $nom, $description, $lieu, $today, $dateService, $idCreateur, $categorie);
  $art->createAnnonce($annonce);

  $annonce = $art->getAnnonce((int)$idAnnonce);
}
$connected = $_SESSION['connected'];
$categories = $_SESSION['nomCategories'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
if (!isset($error)){
  $view->assign('nomCategories', $categories);
  $view->assign('connecter', $connected);
  $view->assign('annonce', $annonce);
  $view->assign('nomAuteur',$nomAuteur);
  $view->assign('user', $user);
  $view->display("annonce.view.php");

} else {
  $view->assign('error',$error);
  $view->assign('user', $user);
  $view->assign('nomCategories', $categories);
  $view->display("creationAnnonce.view.php");
}
?>
