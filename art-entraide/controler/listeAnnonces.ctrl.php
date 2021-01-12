<?php
// ============ Controleur qui gère la listes des annonces ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
if (isset($_GET['motcle']) and ($_GET['motcle'] != '')) {
  $motcle = htmlentities($_GET['motcle']);
}

if (isset($_GET['categorie']) and ($_GET['categorie'] != '') and ($_GET['categorie'] != '0')) {
  $categorie = htmlentities($_GET['categorie']);
}

if(isset($_GET['page'])){
  $page = htmlentities($_GET['page']);
} else {
  $page = 1;
}

$pageSize = 10; // constante du nombre d'élément afficher par page

// ==== PARTIE USAGE DU MODELE ==== //
session_start();
//vérification utilisateur connecté
$connected = htmlentities($_SESSION['connected']);

// Get annonces
$art = new DAO();
$last = $art->getLastIdAnnonce();
$min = $art->getFirstIdAnnonce();

//recuperation des annonces en fonction de la page actuelle et du nombre d'élément par page
$annonces = $art->getPageRef($page,$pageSize);

if(sizeof($annonces) > $pageSize){
  $nbPages = sizeof($annonces)/$pageSize+1;
}else{
  $nbPages=1;
}

if($page == 1){
  $pagePrec = $page;
  $pageSuiv = $page+1;
}else if($page == $nbPages){
  $pagePrec = $page-1;
  $pageSuiv = $page;
}else{
  $pagePrec = $page-1;
  $pageSuiv = $page+1;
}

/*
// Filtrage annonces #1
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

// Filtrage annonces #2
if(isset($categorie) && $categorie !== '0' && $categorie !== ''){
  $annonces = $art->getAnnonceCategorie($categorie);
}

/*
// Filtrage annonces #3
if (isset($motcle) or isset($categorie) or isset($ville) or isset($rayon)){
  $annonces = $art->getAnnonceRecherche($motcle, $categorie, $ville, $rayon);
}
*/

$user = htmlentities($_SESSION['user']);
$categories = htmlentities($_SESSION['nomCategories']);

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

//information nécessaire pour le header
$view->assign('annonces', $annonces);
$view->assign('page', $page);
$view->assign('nbPages', $nbPages);
$view->assign('pagePrec', $pagePrec);
$view->assign('pageSuiv', $pageSuiv);

//information nécessaire pour le header
$view->assign('user', $user);
$view->assign('nomCategories', $categories);
$view->display("listeAnnonces.view.php");

?>
