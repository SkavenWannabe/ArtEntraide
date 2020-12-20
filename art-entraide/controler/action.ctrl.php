<?php
// ============ Controleur qui gère la reponse venant de annonce ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
$action = $_GET['action'];

if ($_GET['annonceId'] != ''){
  $idAnnonce = $_GET['annonceId'];
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

  $idUser = $user->getId();
  $idAnnonce = 4; $idUser = 2; // a supprimer, facilite les tests
  // création de $messages contenant la liste de message correspondant à l'annonce
  $idMessage = $art->getAllIdMessage($idAnnonce,$idUser);
  foreach ($idMessage as $value) {
    $messages[] = $art->getMessage($value);
  }

  $idCreateur = $theAnnonce->getIdCreateur();
  $createur = $art->getUtilisateur($idCreateur);
  $nomDestinataire = $createur->getNom();
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
    $view->assign('nomDestinataire',$nomDestinataire);
    $view->assign('messages',$messages);
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
