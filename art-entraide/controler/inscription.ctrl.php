<?php
// ============ Controleur qui gère l'inscription ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

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

if ($_POST['passwdverif'] != '') {
  $passwdverif = $_POST['passwdverif'];
}else{
  $error[] = "La verification du passwd doit être non nul";
}

if ($passwd !== $passwdverif) {
  $error[] = "Le passwd doit être le même";
}

//recuperation de l'adresse
if ($_POST['p_adresse'] != '') {
  $p_adresse = $_POST['p_adresse'];
}else{
  $p_adresse = "";
}

// ==== PARTIE USAGE DU MODELE ==== //
session_start();

// insert dans la base de données
if(!isset($error)){
  $art = new DAO();
  //création d'un utilisateur
  $id = $art->getLastId() +1; echo "recup id ";
  $uti = new Utilisateur($id,$nom,$prenom,$email,$passwd,$p_adresse);
  $art->createUtilisateur($uti);

  //Sstockage information de connexion
  $_SESSION['connected'] = true;
  $_SESSION['user'] = $nom;

  $annonces[] = $art->getAnnonce(1);
  $annonces[] = $art->getAnnonce(2);
  $annonces[] = $art->getAnnonce(3);
  $annonces[] = $art->getAnnonce(3);
  $message = "Vous êtes compte est créer";

} else {
  $_SESSION['connected'] = false;
}

$connected = $_SESSION['connected'];
$categories = $_SESSION['nomCategories'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();
if (!isset($error)) {
  $view->assign('connecter', $connected);
  $view->assign('annonces', $annonces);
  $view->assign('message', $message);
  $view->assign('nomCategories', $categories);
  $view->display("accueil.view.php");
}else{
  $view->assign('error',$error);
  $view->assign('nomCategories', $categories);
  $view->display("inscription.view.php");
}

?>
