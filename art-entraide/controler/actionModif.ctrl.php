<?php
// ========= Controleur qui permet de gerer les actions du profil ========== //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
if ($_POST['action'] == '') {
  $action = 'error';
}


if ($_POST['action'] == 'modifCompte') {
  $action = 'modifCompte';
}

if ($_POST['action'] == 'modifAnnonce') {
  $action = 'modifAnnonce';
}

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();
//recuperation information de la session

$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//information nécessaire pour le header
$view->assign('nomCategories', $categories);
$view->assign('user', $user);

switch ($action) {
  case 'modifCompte':
    $view->display("modifCompte.view.php");
    break;
  case 'modifAnnonce':
    $view->display("modifAnnonce.view.php");
    break;
  default:
    break;
}
//$view->display("sesAnnonces.view.php");

?>
