<?php
// ============ Controleur qui gère les bouttons du menu ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
if ($_GET['etat'] != '') {
  $etat = htmlentities($_GET['etat']);
}else{
  $etat = '';
}

// recuperation de la categorie == none si non selectionner
$selectCat = htmlentities($_POST['categorie']);

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();

if (!isset($_SESSION['connected'])){
  $_SESSION['connected'] = false;
}

if($etat == "certification"){
  $utilisateurs = $art->getAllUsr();
}

$annonces = $art->getAnnonceAccueil();
$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//information nécessaire pour le header
$view->assign('nomCategories', $categories);
$view->assign('user', $user);

switch ($etat) {
  case 'categorie':
    $view->display("categorie.view.php");
    break;
  case 'connexion':
    $view->display("connexion.view.php");
    break;
  case 'deconection' :
    $view->assign('annonces', $annonces);
    $view->display("accueil.view.php");
    break;
  case 'creation':
    $view->display("inscription.view.php");
    break;
  case 'creationAnnonce':
      $view->display("creationAnnonce.view.php");
      break;
  case 'profil':
      $view->assign('user', $user);
      $view->display("profil.view.php");
      break;
  case 'certification':
      $view->assign('utilisateurs', $utilisateurs);
      $view->display("certif.view.php");
      break;
  default:
    $view->assign('annonces', $annonces);
    $view->display("accueil.view.php");
    break;
}

?>
