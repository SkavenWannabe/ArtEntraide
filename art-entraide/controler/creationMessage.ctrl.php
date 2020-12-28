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
  //Création du nouveau message
  $id_message = $art->getLastIdMes() +1;
  $id_author = $user->getId();
  //$id_repondeur = $art->getIdCreateur($id_annonce);

  //$id_annonce = 4; $id_author = 2; // a supprimer, facilite les tests
  $message = new Message($id_message, $contenu, $today, $id_author);
//var_dump($message);
  $reponse = new Reponse($id_annonce, $id_author, $id_message);
//var_dump($reponse);
  $art->createMessage($message, $reponse);

  //Recuperation de tout les messages échangées
  $theAnnonce = $art->getAnnonce($id_annonce);

  // création de $messages contenant la liste de message correspondant à l'annonce
  $listIdMessage = $art->getAllIdMessage($id_annonce,$id_author);
  foreach ($listIdMessage as $value) {
    $messages[] = $art->getMessage($value);
  }

  $id_createur = $theAnnonce->getIdCreateur();
  $createur = $art->getUtilisateur($id_createur);
  $nomDestinataire = $createur->getNom();
}

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
$view->assign('annonce', $theAnnonce);
$view->assign('nomDestinataire',$nomDestinataire);
$view->assign('messages',$messages);
//information nécessaire pour le header
$view->assign('nomCategories', $categories);
$view->assign('user', $user);

$view->display("conversation.view.php");
?>
