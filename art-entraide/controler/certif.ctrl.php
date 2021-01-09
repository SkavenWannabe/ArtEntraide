<?php
// ============ Controleur qui gère l'inscription ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //

if ($_POST['action'] == 'addCertif') {
  $action = 'addCertif';
}

elseif ($_POST['action'] == 'suppCertif') {
  $action = 'suppCertif';
}

if ($_POST['idUsr'] != '') {
  $idUsr = $_POST['idUsr'];
} else {
  $idUsr = -1;
}

session_start();

$art = new DAO();

if ($idUsr != -1) {
  $user = $art->getUtilisateur($idUsr);
  if ($action == 'suppCertif') {
    $user->setCertif(false);
    $art->updateUtilisateur($user);
  }
  elseif ($action == 'addCertif') {
    $user->setCertif(true);
    $art->updateUtilisateur($user);
  }
}

$utilisateurs = $art->getAllUsr();

$user = $_SESSION['user'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

$view->assign('user', $user);
$view->assign('utilisateurs', $utilisateurs);
$view->display("certif.view.php");

?>
