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
if ($connected) {
  $art = new DAO();
  //récupération de l'annonce
  $allCategories = $art->getAllCategorie();

  //récupération du nom de chaque catégorie
  $taille = count($allCategories);
  for ($i = 0; $i < $taille; $i++) {
    $categories[] = $allCategories[0]->getNom();
  }

  //récupération de l'utilisateur en cours/connecté
  $user = $_SESSION['user'];
}

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
if ($connected) {
  $view->assign('categories',$categories);
  $view->assign('user',$user);
  $view->display("listeAnnnonces.view.php");
}else {
  $view->display("connexion.view.php");
}

?>
