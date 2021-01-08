<?php

// ============ Controleur qui gère la vue contact ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //

// Récupérer le nom de la vue à afficher en GET


// --- recuperation du nom --- //
if ($_POST['sujet'] != '') {
  $sujet = $_POST['sujet'];
}else{
  $error[] = "Il doit y avoir un sujet";
}

// --- recuperation du prenom --- //
if ($_POST['mail'] != '') {
  $mail = $_POST['mail'];
}else{
  $error[] = "Vous devez mettre votre adresse mail";
}

// --- recuperation de l'adresse email --- //
if ($_POST['corp'] != '') {
  $corp = $_POST['corp'];
}else{
  $error[] = "Vous devez mettre un message";
}

// Ouvrir la session
session_start();
$art = new DAO();
// Récupérer les infos nécessaires au header (user et catégories)
$user = $_SESSION['user'];
$nomCategories = $_SESSION['nomCategories'];

if (!isset($error)) {
  $annonces = $art->getAnnonceAccueil();
  $message = "Votre message a bien été pris en compte";
}

// Fermer la session
session_write_close();


// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

// Passer à la vue les infos nécessaires au header

if (!isset($error)) {
  $view->assign('annonces', $annonces);
  $view->assign('message', $message);
  //information nécessaire pour le header
  $view->assign('user', $user);
  $view->assign('nomCategories', $nomCategories);
  $view->display("accueil.view.php");
}
else{
  $view->assign('error',$error);
  $view->assign('user', $user);
  $view->assign('nomCategories', $nomCategories);
  $view->display("contact.view.php");
}

?>
