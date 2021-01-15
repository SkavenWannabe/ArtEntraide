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

$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

$art = new DAO();
if ($user != NULL) {
  if ($art->ifCertif($user->getEmail())) {
    if ($idUsr != -1) {
      $userACertif = $art->getUtilisateur($idUsr);
      if ($action == 'suppCertif') {
        $userACertif->setCertif(false);
        $art->updateUtilisateur($userACertif);
        $message = "La certification à bien été enlever à " . $userACertif->getPrenom() . " " . $userACertif->getNom() . ".";
      }
      elseif ($action == 'addCertif') {
        $userACertif->setCertif(true);
        $art->updateUtilisateur($userACertif);
        $message = "La certification à bien été ajouter à " . $userACertif->getPrenom() . " " . $userACertif->getNom() . ".";
      }
    }
  }
  else {
    $error[] = 'Vous n\'etes pas certificateur, comment avez vous fait pour etre la ?';
    $annonces = $art->getAnnonceAccueil();
  }
}
else{
  $annonces = $art->getAnnonceAccueil();
}

$utilisateurs = $art->getAllUsr();



session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

if($user != NULL) {
  if ($art->ifCertif($user->getEmail())) {
    $view->assign('error', $error);
    $view->assign('message', $message);
    $view->assign('user', $user);
    $view->assign('nomCategories', $categories);
    $view->assign('utilisateurs', $utilisateurs);
    $view->display("certif.view.php");
  }
  else{
    $view->assign('annonces', $annonces);
    //information nécessaire pour le header
    $view->assign('user', $user);
    $view->assign('nomCategories', $categories);

    //->transmition des 2 annonces a la page d'accueil
    $view->display("accueil.view.php");
  }
}
else{
  $view->assign('annonces', $annonces);
  //information nécessaire pour le header
  $view->assign('user', $user);
  $view->assign('nomCategories', $categories);

  //->transmition des 2 annonces a la page d'accueil
  $view->display("accueil.view.php");
}
?>
