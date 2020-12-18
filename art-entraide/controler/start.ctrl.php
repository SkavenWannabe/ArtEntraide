<?php
// ============ Controleur qui lance l'application au début ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
$_SESSION['connected'] = false;

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();
if(!isset($_SESSION['connected'])){
  $_SESSION['connected'] = false;
  $_SESSION['user'] = NULL;
}

echo " session : " . $_SESSION['connected'];

$annonces = $art->getAnnonceAccueil();

//récupération de l'annonce
$allCategories = $art->getAllCategorie();
//récupération du nom de chaque catégorie
foreach ($allCategories as $value){
    $categories[] = $value->getNom();
}

$user = $_SESSION['user'];
$_SESSION['nomCategories'] = $categories;

session_write_close();


// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
$view->assign('annonces', $annonces);
//information nécessaire pour le header
$view->assign('user', $user);
$view->assign('nomCategories', $categories);

//->transmition des 2 annonces a la page d'accueil
$view->display("accueil.view.php");

?>
