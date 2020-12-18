<?php
// ============ Controleur qui gère la reponse venant de annonce ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
if ($_GET['annonceId'] != ''){
  $idAnnonce = $_POST['annonceId'];
}

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();

$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

if($user == NULL){
  $action = 'erreur';
  $annonces = $art->getAnnonceAccueil();
} else {
  $theAnnonce = $art->getAnnonce($idAnnonce);
  // création de $messages contenant la liste de message correspondant à l'annonce
  // boucle
  //    $idMessage = $art->getIdMessage($idAnnonce);
  //    $messages[] = $art->getMessage(getMessage);
}

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//information nécessaire pour le header
$view->assign('nomCategories', $categories);
$view->assign('user', $user);

switch ($action) {
  case 'repondre':
    $view->assign('annonce', $theAnnonce);
    $view->display("conversation.view.php");
    break;
  case 'erreur':
    $view->assign('annonces', $annonces);
    $view->display("accueil.view.php");
    break;
  default:
    break;
}

?>
