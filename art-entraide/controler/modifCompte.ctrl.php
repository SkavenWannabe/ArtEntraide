<?php
// ============ Controleur qui gère la modification d'un compte ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");
include_once(__DIR__."/../model/Categorie.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
// --- recuperation du nom --- //
if ($_POST['nom'] != '') {
  $nom = htmlentities($_POST['nom']);
}else{
  $error[] = "Le nom doit être non nul";
}

// --- recuperation du nom --- //
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
  $error[] = "Le password doit être non nul";
}

if ($_POST['passwdverif'] != '') {
  $passwdverif = $_POST['passwdverif'];
}else{
  $error[] = "La verification du password doit être non nul";
}

if ($passwd !== $passwdverif) {
  $error[] = "Le password doit être le même";
}

//recuperation de l'adresse
if ($_POST['p_adresse'] != '') {
  $p_adresse = $_POST['p_adresse'];
}else{
  $p_adresse = "";
}
// ==== PARTIE USAGE DU MODELE ==== //

session_start();
$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

if(!isset($error)){
  $art = new DAO();

  //modification au niveau de la classe du compte utilisateur
  $user->setNom($nom);
  $user->setPrenom($prenom);
  $user->setEmail($email);
  $user->setPassword($passwd);

  if($user instanceof Utilisateur){
    $user->setAdresse($p_adresse);

    //modification en base du compte
    $art->updateUtilisateur($user);
  }
  else if($user instanceof Certificateur){
    $art->updateCertif($user);
  }

}

session_write_close();


// ==== PARTIE SELECTION DE LA VUE ==== //

$view = new View();

$view->assign('nomCategorie',$categories);
$view->assign('user', $user);

if(!isset($error)){
  $view->display("profil.view.php");
}else{
  $view->assign('error',$error);
  $view->display("modifCompte.view.php");
}
?>
