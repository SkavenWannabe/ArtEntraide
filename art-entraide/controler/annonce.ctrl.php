<?php
// ============ Controleur qui gère une annonce ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
//include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //

// ==== PARTIE USAGE DU MODELE ==== //

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
$view->assign('error',$error);

$view->display("annonce.view.php");

?>
