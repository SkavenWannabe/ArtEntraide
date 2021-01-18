<?php
// ============ Controleur qui permet de supprimer son compte ============ //

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

//action pour supprimer un compte
$id = $user->getId();
$art->deleteUtilisateur($id);
$message = "Votre compte a bien été supprimé.";

//recupération annonces affiché à l'accueil
$user = NULL;
$_SESSION['user'] = NULL;
$annonces = $art->getAnnonceAccueil();

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//information nécessaire pour le header
$view->assign('nomCategories', $categories);
$view->assign('user', $user);

$view->assign('annonces', $annonces);
$view->assign('message', $message);

$view->display("accueil.view.php");

?>
