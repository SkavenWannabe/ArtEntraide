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
  $error[] = "Le mot de passe doit être non nul";
}


// ==== PARTIE USAGE DU MODELE ==== //
session_start();

if (!isset($error)) {
  $art = new DAO();
  $verif = $art->getPass($email);

  if($verif === $passwd){
    $_SESSION['connected'] = true;

    //récupération utilisateur connecté
    $user = $art->getUtiliMail($email);
    $_SESSION['user'] = $user;

    //Nécessaire à l'affichage des annonces une foi connecté
    $annonces = $art->getAnnonceAccueil();

    $message = "Vous êtes connecté";

    if ($user->getCertif()){
      print("Certif : True\n");
      $utilisateurs = $art->getAllUsr();
    }
    else {
      print("Cert : False\n");
    }

    print($user->getPrenom());
    print($user->getNom());

  } else {
    $error[] = "Identifiant ou mot de passe incorrect.";
    $_SESSION['connected'] = false;
    $user = NULL;
  }

  $connected = $_SESSION['connected'];
}

$categories = $_SESSION['nomCategories'];
session_write_close();


// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

if (!isset($error) && $connected) {
  if ($user->getCertif()) {
    $view->assign('message', $message);
    $view->assign('user', $user);
    $view->assign('utilisateurs', $utilisateurs);
    $view->display("certif.view.php");
  }
  else {
    $view->assign('message', $message);
    $view->assign('connecter', $connected);
    $view->assign('annonces', $annonces);
    //information nécessaire pour le header
    $view->assign('nomCategories', $categories);
    $view->assign('user', $user);
    $view->display("accueil.view.php");
  }
}
else {
  $view->assign('error',$error);
  $view->assign('user', $user);
  $view->assign('nomCategories', $categories);
  $view->display("connexion.view.php");
}

?>
