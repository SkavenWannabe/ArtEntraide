<?php
// ============ Controleur qui gère les bouttons du menu ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
//include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
if ($_POST['etat'] != '') {
  $etat = $_POST['etat'];
}else{
  $etat = '';
}
// ==== PARTIE USAGE DU MODELE ==== //

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
switch ($etat) {
  case 'categorie':
    $view->display("categorie.view.php");
    break;
  case 'connexion':
    $view->display("categorie.view.php");
    break;
  case 'creation':
    $view->display("inscription.view.php");
    break;
  default:
    break;
}

?>
