<?php
// ============ Controleur qui permet de supprimer une annonce ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
$annonceId = $_GET['annonceId'];

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();

//action pour supprimer une annonce
$annonce = $art->getAnnonce($annonceId);
$art->deleteAnnonce($annonce);
$message = "Cette annonce a bien été supprimé.";

//recuperation information de la session
$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

//recuperation des annonces créer pas l'utilisateur courant
$annonces = $art->getSesAnnonce($user);

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//information nécessaire pour le header
$view->assign('nomCategories', $categories);
$view->assign('user', $user);

$view->assign('annonces', $annonces);

//$view->display("sesAnnonces.view.php");

?>