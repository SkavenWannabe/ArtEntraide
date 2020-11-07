<?php
// ============ Controleur qui lance l'application au début ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
//include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$utilisateur = new DAO();

//->interrogation DAO pour récupérer 2 annonces


$_SESSION['session'] = $utilisateur;

session_write_close();


// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

//->transmition des 2 annonces a la page d'accueil
$view->display("accueil.view.php");

?>
