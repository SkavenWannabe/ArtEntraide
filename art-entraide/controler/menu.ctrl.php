<?php
// ============ Controleur qui gère les bouttons du menu ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
if ($_POST['etat'] != '') {
  $etat = $_POST['etat'];
}else{
  $etat = '';
}
echo $etat;
// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();
if($_SESSION['connected']){
  $annonces[] = $art->getAnnonce(1);
  $annonces[] = $art->getAnnonce(2);
  $annonces[] = $art->getAnnonce(3);
  $annonces[] = $art->getAnnonce(3);
}

$categories = $_SESSION['nomCategories'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
$view->assign('nomCategories', $categories);

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
  default:
    break;
}

?>
