<?php
// ============ Controleur qui gère l'inscription ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
//include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
// --- recuperation du nom --- //
if ($_POST['nom'] != '') {
  $nom = $_POST['nom'];
}else{
  $error[] = "Le nom doit être non nul";
}

// --- recuperation du prenom --- //
if ($_POST['prenom'] != '') {
  $prenom = $_POST['prenom'];
}else{
  $error[] = "Le prenom doit être non nul";
}

// --- recuperation du numéro de téléphone --- //
if ($_POST['phone'] != '') {
  $phone = $_POST['phone'];
}else{
  $error[] = "Le numero de telephone doit être non nul";
}

// --- recuperation de l'adresse email --- //
if ($_POST['email'] != '') {
  $email = $_POST['email'];
}else{
  $error[] = "L' email doit être non nul";
}

// --- recuperation du mot de passe --- //
if ($_POST['passwd'] != '') {
  $passwd = $_POST['passwd'];
}else{
  $error[] = "Le passwd doit être non nul";
}

//recuperation de l'adresse
$adresse = "2 rue laville";

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
// insert dans la base de données
if(!isset($error)){
  $art = new DAO();
  $id = $art->getLastId();
  $uti = new Utilisateur($id,$nom,$prenom,$phone,false,$email,$passwd,$adresse);
  $art->createUtilisateur($uti);
  $_SESSION['connected'] = true;
}

$_SESSION['connected'] = false;

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
if (/*insertion pas réussi*/ true) {
  $view->assign('error',$error);
  $view->display("inscription.view.php");
}else{
  $view->display("listeAnnnonces.view.php");
}

?>
