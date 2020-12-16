<?php
// ============ Controleur qui gère la listes des annonces ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
echo "liste annonces ctrl";

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
//vérification utilisateur connecté
$connected = $_SESSION['connected'];
$art = new DAO();

$annonces[] = $art->getAnnonce(1);
$annonces[] = $art->getAnnonce(2);
$annonces[] = $art->getAnnonce(3);
$annonces[] = $art->getAnnonce(4);

$categories = $_SESSION['nomCategories'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

//information nécessaire pour le header
$view->assign('annonces', $annonces);
$view->assign('nomCategories', $categories);
$view->display("listeAnnnonces.view.php");


?>
