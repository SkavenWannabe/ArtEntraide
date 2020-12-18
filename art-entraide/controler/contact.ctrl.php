<?php
// ============ Controleur qui gère la listes des annonces ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
$_SESSION['connected'] = false;

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();
if(!isset($_SESSION['connected'])){
  $_SESSION['connected'] = false;
  $_SESSION['user'] = NULL;
}

echo " session : " . $_SESSION['connected'];

$user = $_SESSION['user'];

session_write_close();
