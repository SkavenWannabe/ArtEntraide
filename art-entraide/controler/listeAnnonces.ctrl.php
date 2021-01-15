<?php
// ============ Controleur qui gère la listes des annonces ============ //

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");
// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

// ==== PARTIE RECUPERATION DES DONNEES ==== //
if (isset($_GET['motcle']) and ($_GET['motcle'] != '')) {
  $motcle = htmlentities($_GET['motcle']);
}else{
  $motcle = '';
}

if (isset($_GET['categorie']) and ($_GET['categorie'] != '') and ($_GET['categorie'] != '0')) {
  $categorie = htmlentities($_GET['categorie']);
} else {
  $categorie = '';
}

if (isset($_GET['type']) and ($_GET['type'] != '') and ($_GET['type'] != '0')) {
  $type = htmlentities($_GET['type']);
} else {
  $type = '';
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
if($categorie == '' && $motcle == '' && $type == ''){
  $annonces = $art->getPageRef($page,$pageSize);
}

// Filtrage annonces #3
if($categorie != '' || $motcle != '' || $type != ''){
  $annonces = $art->getAnnonceRecherche($motcle, $categorie,$type,$page,$pageSize);
}

//recuperation du nombre d'élément
$nbElement = $art->getNbPage($motcle,$categorie,$type);

//calcul du nombre de page possible
if($nbElement > $pageSize){
  $nbPages = round($nbElement/$pageSize)+1;
}else{
  $nbPages=1;
}

//calcul nouvelle valeur pour page suivant et precedente
//possibilité ensuite d'affiché le nombre de page, etc..
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

$user = $_SESSION['user'];
$categories = $_SESSION['nomCategories'];

session_write_close();

// ==== PARTIE SELECTION DE LA VUE ==== //
$view = new View();

//information nécessaire pour la liste des annonces
$view->assign('annonces', $annonces);
$view->assign('page', $page);
$view->assign('nbPages', $nbPages);
$view->assign('pagePrec', $pagePrec);
$view->assign('pageSuiv', $pageSuiv);

// Informations nécessaires pour le feedback des filtres
$view->assign('categorie', $categorie);
$view->assign('type', $type);
$view->assign('motcle', $motcle);

//information nécessaire pour le header
$view->assign('user', $user);
$view->assign('nomCategories', $categories);
$view->display("listeAnnonces.view.php");

?>
