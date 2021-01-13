<?php
// ============ Controleur qui gère la création d'un message ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
// --- recuperation idAnnonce --- //
$id_annonce = htmlentities($_POST['annonceId']);

if ($_POST['contenu'] != ''){
  $contenu = htmlentities($_POST['contenu']);
}else{
  $error = '';
}

$today = date("y.m.d");

if ($_POST['id_repondeur'] != ''){
  $id_repondeur = htmlentities($_POST['id_repondeur']);
}else{
  $id_repondeur = -1;
}

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

  $message = new Message($id_message, $contenu, $today, $id_author);

  if($id_repondeur == -1){
    $reponse = new Reponse($id_annonce, $id_author, $id_message);
  } else {
    $reponse = new Reponse($id_annonce, $id_repondeur, $id_message);
  }

  $art->createMessage($message, $reponse);

  //Recuperation de tout les messages échangées
  $theAnnonce = $art->getAnnonce($id_annonce);

  // création de $messages contenant la liste de message correspondant à l'annonce
  if($id_repondeur == -1){
    $listIdMessage = $art->getAllIdMessage($id_annonce,$id_author);
    foreach ($listIdMessage as $value) {
      $messages[] = $art->getMessage($value);
    }

    $nomDestinataire = $theAnnonce->getCreateur()->getNom();

  } else{
    $listIdMessage = $art->getAllIdMessage($id_annonce,$id_repondeur);
    foreach ($listIdMessage as $value) {
      $messages[] = $art->getMessage($value);
    }

    $createur = $art->getUtilisateur($id_repondeur);
    $nomDestinataire = $createur->getNom();
  }

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
