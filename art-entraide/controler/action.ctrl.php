<?php
// ============ Controleur qui gère différentes petites actions ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
if ($_POST['action'] != '') {
  $action = $_POST['action'];
}else{
  $action = '';
}

echo "action : " .$action;

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();

$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//information nécessaire pour le header
$view->assign('nomCategories', $categories);
$view->assign('user', $user);

switch ($action) {
  case 'repondre':
    $view->display("reponseAnnonce.view.php");
    break;
  case 'proposerEchange':
    $view->display("proposerEchange.view.php");
    break;
  default:
    break;
}

?>
