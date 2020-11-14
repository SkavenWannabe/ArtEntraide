<?php
// ============ Controleur qui gère l'inscription ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
//include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //

//morceau eventuellement a changer suivant les vues et la façons dont est gérer la connexion
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


// ==== PARTIE USAGE DU MODELE ==== //
session_start();

if (!isset($error)) {
  $art = new DAO();
  $verif = $art->getPass($email);

  if($verif == $passwd){
    $_SESSION['connected'] = true;
  }else{
    $_SESSION['connected'] = false;
  }

  $connected = $_SESSION['connected']; 
}

session_write_close();


// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

if (!isset($error) && $connected) {
  $view->display("listeAnnnonces.view.php");
} else {
  $view->assign('error',$error);
  $view->display("connexion.view.php");
}

?>
