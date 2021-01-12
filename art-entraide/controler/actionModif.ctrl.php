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

if ($_POST['idAnnonce'] != '') {
  $idAnnonce = $_POST['idAnnonce'];
} else {
  $idAnnonce = -1;
}

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();
//recuperation information de la session

if ($idAnnonce != -1) {
  $annonce = $art->getAnnonce($idAnnonce);
}

$user = htmlentities($_SESSION['user']);
$nomCategories = htmlentities($_SESSION['nomCategories']);

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//information nécessaire pour le header
$view->assign('nomCategories', $nomCategories);
$view->assign('user', $user);

switch ($action) {
  case 'modifCompte':
    $view->display("modifCompte.view.php");
    break;
  case 'modifAnnonce':
    $view->assign('annonce', $annonce);
    $view->display("modifAnnonce.view.php");
    break;
  default:
    break;
}
//$view->display("sesAnnonces.view.php");

?>
