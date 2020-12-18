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
$last = $art->getLastIdAnnonce();
$min = $art->getFirstIdAnnonce();

$i = 0;
while($last >= $min && $i < 10) {
    $annonces[] = $art->getAnnonce($last);
    $last--; $i++;
}

$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

//information nécessaire pour le header
$view->assign('annonces', $annonces);
//information nécessaire pour le header
$view->assign('user', $user);
$view->assign('nomCategories', $categories);
$view->display("listeAnnonces.view.php");


?>
