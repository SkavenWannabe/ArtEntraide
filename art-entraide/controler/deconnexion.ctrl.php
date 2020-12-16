<?php
// ============ Controleur qui gère l'inscription ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //

// ==== PARTIE USAGE DU MODELE ==== //

session_start();
$art = new DAO();

//Nécessaire à l'affichage des annonces une foi déconnécté
$last = $art->getLastIdAnnonce();
for ($i=0; $i < 4 ; $i++) {
    $annonces[] = $art->getAnnonce($last);
    $last--;
}

$categories = $_SESSION['nomCategories'];
$_SESSION['user'] = NULL;
$_SESSION['connected'] = false;

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //

$view = new View();

$view->assign('nomCategories', $categories);
$view->assign('user', $user);
$view->display("accueil.view.php");
?>
