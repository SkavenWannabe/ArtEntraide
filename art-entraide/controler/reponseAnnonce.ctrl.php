<?php
// ============ Controleur qui gère une annonce ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");
include_once(__DIR__."/../model/Categorie.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //

// ==== PARTIE USAGE DU MODELE ==== //

session_start();
$art = new DAO();

$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];
session_write_close();


// ==== PARTIE SELECTION DE LA VUE ==== //

$view = new View();
//information nécessaire pour le header
$view->assign('nomCategorie',$nomCategorie);
$view->assign('user', $user);

$view->display("annonce.view.php");
?>
