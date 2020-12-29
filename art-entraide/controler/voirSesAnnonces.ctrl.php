<?php
// ====== Controleur qui permet a un utilisateur de voir ses annonces ======= //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();

//recuperation information de la session
$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

//recuperation des annonces créer pas l'utilisateur courant
$annonces = $art->getSesAnnonce($user);
var_dump($annonces);

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//information nécessaire pour le header
$view->assign('nomCategories', $categories);
$view->assign('user', $user);

$view->assign('annonces', $annonces);

$view->display("sesAnnonces.view.php");

?>
