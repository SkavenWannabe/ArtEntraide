<?php
// ============ Controleur qui gère une annonce ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");
include_once(__DIR__."/../model/Categorie.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
$idAnnonce = $_GET['idAnnonce'];
$idCategorie = $_GET['idCategorie'];

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();
//récupération de l'annonce
$annonce = $art->getAnnonce((int)$idAnnonce);

//récupération du nom de l'auteur
$idAuteur = $annonce->getIdCreateur();
$auteur = $art->getUtilisateur($idAuteur);
$nomAuteur = $auteur->getNom();

//récupération du nom de la catégorie
$idCategorie = $annonce->getIdCategorie();
$categorie = $art->getCategorie($idCategorie);
$nomCategorie = $categorie->getNom();

$categories = $_SESSION['nomCategories'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//$view->assign('error',$error);
//$view->display("annonce.view.php");

$view->assign('annonce', $annonce);
$view->assign('nomAuteur',$nomAuteur);
$view->assign('nomCategorie',$nomCategorie);
$view->assign('nomCategories', $categories);

$view->display("annonce.view.php");
?>
