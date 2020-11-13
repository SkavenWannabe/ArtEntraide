<?php
// ============ Controleur qui lance l'application au début ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
//include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
//$art = new DAO();

//$annonce[] = $art->getAnnonce(1);
//$annonce[] = $art->getAnnonce(2);
//$annonce[] = $art->getAnnonce(3);

session_write_close();


// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//$view->assign('annonce', $annonce);

//->transmition des 2 annonces a la page d'accueil
$view->display("accueil.view.php");

?>
