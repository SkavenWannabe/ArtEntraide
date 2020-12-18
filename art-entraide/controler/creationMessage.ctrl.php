<?php
// ============ Controleur qui gère la création d'un message ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
// --- recuperation idAnnonce --- //
$id_annonce = $_POST['annonceId'];

if ($_POST['contenu'] != ''){
  $contenu = $_POST['contenu'];
}else{
  $error = '';
}

$today = date("y.m.d");

// ==== PARTIE USAGE DU MODELE ==== //

session_start();
$art = new DAO();

//recuperation du user si il existe
$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

if(!isset($error)){
  $id_message = $art->getLastIdMes();
  $id_author = $user->getId();
  $id_repondeur = $art->getIdCreateur($id_annonce);

  $message = new Message($id_message, $contenu, $today, $id_author);
  $reponse = new Reponse($id_annonce, $id_repondeur, $id_message);
  $art->createMessage($message, $reponse);

}

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//information nécessaire pour le header
$view->assign('nomCategories', $categories);
$view->assign('user', $user);

$view->display("conversation.view.php");
?>
