<?php
// ============ Controleur qui gère la listes des annonces ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
//include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
echo "liste annonces ctrl";

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
//vérification utilisateur connecté
$connected = $_SESSION['connected'];

$_SESSION['nomCategories'] = $categories;

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
if ($connected) {
  $view->assign('categories',$categories);
  $view->assign('user',$user);
  $view->assign('nomCategories', $categories);
  $view->display("listeAnnnonces.view.php");
}else {
  $view->assign('nomCategories', $categories);
  $view->display("connexion.view.php");
}

?>
