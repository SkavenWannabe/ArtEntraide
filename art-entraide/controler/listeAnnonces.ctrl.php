<?php
// ============ Controleur qui gère la listes des annonces ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
if (isset($_GET['motcle']) and ($_GET['motcle'] != '')) {
  $motcle = $_GET['motcle'];
}

if (isset($_GET['categorie']) and ($_GET['categorie'] != '') and ($_GET['categorie'] != '0')) {
  $categorie = $_GET['categorie'];
}

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
//vérification utilisateur connecté
$connected = $_SESSION['connected'];

// Get annonces
$art = new DAO();
$last = $art->getLastIdAnnonce();
$min = $art->getFirstIdAnnonce();

//recuperation temporaire, futur recupération en fonction d'un nombre de page
$i = 0;
while($last >= $min && $i < 10) {
    $annonces[] = $art->getAnnonce($last);
    $last--; $i++;
}
/*
// Filtrage annonces
foreach ($annonces as $currentAnnonce){

  if (isset($motcle)){
    $nomOK = (strpos($currentAnnonce->getNom(),$motcle) !== false);
  } else {
    $nomOK = true;
  }

  if (isset($categorie)){
    $categorieOK = ($currentAnnonce->getCategorie()->getNom() == $categorie);
  } else {
    $categorieOK = true;
  }

  if ($nomOK and $categorieOK) {
    $annoncesFiltrees[] = $currentAnnonce;
  }
}

$annonces = $annoncesFiltrees;
*/

if(isset($categorie) && $categorie !== '0' && $categorie !== ''){
  $annonces = $art->getAnnonceCategorie($categorie);
}


$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

//information nécessaire pour le header
$view->assign('annonces', $annonces);
//information nécessaire pour le header
$view->assign('user', $user);
$view->assign('nomCategories', $categories);
$view->display("listeAnnonces.view.php");

?>
