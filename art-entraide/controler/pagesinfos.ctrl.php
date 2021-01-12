<?php
// ============ Controleur qui gère les vues "informatives" ============ //
// Les vues dites "informatives" sont le "A propos", la page de contact,
// la FAQ, les mentions légales et la politique de confidentialité
// En théorie, elles ne contiennent que du texte et n'auraient pas besoin
// d'un contrôleur pour être affichées... MAIS le header, lui, a besoin
// de l'utilisateur connecté et des catégories affichées dans le menu
// On a donc ce contrôleur, qui récupère simplement ces données depuis
// la session et appelle la bonne vue.
// Pour choisir la vue à afficher, un paramètre "page" doit être passé
// en GET (permet d'appeler ce contrôleur avec un simple lien, sans
// devoir faire un formulaire)


// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //

// Récupérer le nom de la vue à afficher en GET
if (isset($_GET['page'])) {
  $page = htmlentities($_GET['page']);
}

// Ouvrir la session
session_start();
// Récupérer les infos nécessaires au header (user et catégories)
$user = $_SESSION['user'];
$nomCategories = $_SESSION['nomCategories'];
// Fermer la session
session_write_close();


// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

// Passer à la vue les infos nécessaires au header
$view->assign('nomCategories',$nomCategories);
$view->assign('user', $user);

// Charger la bonne vue selon $page, parmi les 5 vues informatives possibles
switch ($page) {
  case 'description':
    $view->display("description.view.php");
    break;
  case 'contact':
    $view->display("contact.view.php");
    break;
  case 'FAQ':
    $view->display("FAQ.view.php");
    break;
  case 'legal':
    $view->display("legal.view.php");
    break;
  case 'confidentialite':
    $view->display("confidentialite.view.php");
    break;
}
?>
