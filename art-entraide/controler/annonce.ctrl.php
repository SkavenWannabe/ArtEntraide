<?php
// ============ Controleur qui gère une annonce ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
//include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
$idAnnonce = $_GET['idAnnonce'];
$idCategorie = $_GET['idCategorie'];

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();
$annonce = $art->getAnnonce($idAnnonce);
$nomAuteur = $annonce->getNom();
$nomCategorie = $annonce->getIdCategorie()->getNom();

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//$view->assign('error',$error);
//$view->display("annonce.view.php");

$view->assign('annonce', $annonce);
$view->assign('nomAuteur',$nomAuteur);
$view->assign('nomCategorie',$nomCategorie);

$view->dispay("annonce.view.php");
?>
