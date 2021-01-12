<?php
// ============ Controleur qui gère l'inscription ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //

// ==== PARTIE USAGE DU MODELE ==== //

session_start();

$categories = htmlentities($_SESSION['nomCategories']);
$_SESSION['user'] = NULL;
$_SESSION['connected'] = false;

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //

include_once(__DIR__."/start.ctrl.php");
?>
