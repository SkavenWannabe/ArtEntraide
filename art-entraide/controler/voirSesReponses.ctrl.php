<?php
// === Controleur qui gère l'affichage de toute les discussions d'une personne ===== //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
// ==== PARTIE USAGE DU MODELE ==== //

session_start();
$art = new DAO();

//recuperation du user si il existe
$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

// pour chaque annonce + pour chaque utilisateur ayant répondu
//    liste[nomAnnonce][message]
$listeMessage = $art->getSesDiscussion($user);
//var_dump($listeMessage);

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//information nécessaire pour le header
$view->assign('nomCategories', $categories);
$view->assign('user', $user);
$view->assign('listeMessage',$listeMessage);

$view->display('listeReponses.view.php');

?>
