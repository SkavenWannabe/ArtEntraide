<?php
// === Controleur qui gère lors de la validation d'une annonce ===== //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
if ($_GET['annonceId'] != ''){
  $id_annonce = $_GET['annonceId'];
}

if ($_GET['idUser'] != ''){
  $id_repondeur = $_GET['idUser'];
}


$today = date("y.m.d");

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
$art = new DAO();

//recuperation du user si il existe
$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

$annonce = $art->getAnnonce($id_annonce);

// mise a jour de l'annonce
$annonce->setEstActive(false);
$art->updateAnnonce($annonce);

//var_dump($annonce);


//envoie automatique d'un message à l'utilisateur qu'il à choisi
$id_message = $art->getLastIdMes() +1;
$id_author = $user->getId();
$contenu = "L'utilisateur vous à choisi pour son annonce.";
$message = new Message($id_message, $contenu, $today, $id_author);
$reponse = new Reponse($id_annonce, $id_repondeur, $id_message);
$art->createMessage($message, $reponse);


//Recuperation de tout les messages échangées
$listIdMessage = $art->getAllIdMessage($id_annonce,$id_repondeur);
foreach ($listIdMessage as $value) {
  $messages[] = $art->getMessage($value);
}

$createur = $art->getUtilisateur($id_repondeur);
$nomDestinataire = $createur->getNom();

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
//information nécessaire pour le header
$view->assign('nomCategories', $categories);
$view->assign('user', $user);

$view->assign('annonce', $annonce);
$view->assign('nomDestinataire',$nomDestinataire);
$view->assign('messages',$messages);

$view->display("conversation.view.php");
?>
