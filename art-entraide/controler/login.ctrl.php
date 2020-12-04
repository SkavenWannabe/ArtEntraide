<?php
// ============ Controleur qui gère l'inscription ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //

//morceau eventuellement a changer suivant les vues et la façons dont est gérer la connexion
// --- recuperation de l'adresse email --- //
if ($_POST['pseudo'] != '') {
  $email = $_POST['pseudo'];
}else{
  $error[] = "L' email doit être non nul";
}

// --- recuperation du mot de passe --- //
if ($_POST['password'] != '') {
  $passwd = $_POST['password'];
}else{
  $error[] = "Le passwd doit être non nul";
}


// ==== PARTIE USAGE DU MODELE ==== //
session_start();

if (!isset($error)) {
  $art = new DAO();
  $verif = $art->getPass($email);

  if($verif === $passwd){
    $_SESSION['connected'] = true;
    //récupération nom de l'utilisateur connecté
    $nom = $art->getNomUtilisateur($email);

    $_SESSION['user'] = $nom;

    $annonces[] = $art->getAnnonce(1);
    $annonces[] = $art->getAnnonce(2);
    $annonces[] = $art->getAnnonce(3);
    $annonces[] = $art->getAnnonce(3);
    $message = "Vous êtes connecté";
  }else{
    $error[] = "Ce n'est pas le bon mot de passe";
    $_SESSION['connected'] = false;
  }

  $connected = $_SESSION['connected'];
}
session_write_close();


// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

if (!isset($error) && $connected) {
  $view->assign('annonces', $annonces);
  $view->assign('message', $message);
  $view->assign('connecter', $connected);
  $view->display("accueil.view.php");
} else {
  $view->assign('error',$error);
  $view->display("connexion.view.php");
}

?>
