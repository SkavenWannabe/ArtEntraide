<!-- Variables à donner à cette vue
$categories : Liste du nom de chaque catégories
$user : Utilisateur connecté
$annonces : liste des annonces trouvées pour cette page (20 annonces par page)
$page : numéro de la page actuelle (de 1 à x)
$nbPages : numéro de la dernière page (nombre de pages totales pour cette recherche)
 -->
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Rechercher une annonce</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/listeAnnonces.css">
    <link rel="stylesheet" href="/view/css/annonce.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>

  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>

      <h1>Rechercher une annonce</h1>

      <form class="" action="listeAnnonces.ctrl.php" method="get">
        <input type="text" name="motcle" placeholder="Mots clés">
        <input list="villes" name="ville" placeholder="Ville">
        <!-- Liste des villes de france -->
        <datalist id="villes">
          <?php foreach ($listeVilles as $value): ?>
            <option value="<?= $value ?>">
          <?php endforeach; ?>
        </datalist>
        <select name="rayon">
          <option value="0" disabled selected>Rayon</option>
            <option value="1">1km</option>
            <option value="2">2km</option>
            <option value="5">5km</option>
            <option value="10">10km</option>
            <option value="0">Pas de limite</option>
        </select>
        <select name="categorie">
          <option value="0" disabled selected>Catégorie</option>
          <?php foreach ($nomCategories as $value) : ?>
            <option value="<?= $value ?>"><?= $value ?></option>
          <?php endforeach; ?>
        </select>

        <!-- Bouton de retour à la page précédente -->
        <?php if ($page > 1): ?>
          <button type="submit" name="page" value="<?= $pagePrec ?>">Page Précédente</button>
        <?php endif; ?>
        <!-- Bouton pour passer à la page suivante -->
        <?php if ($page = $nbPages): ?>
          <button type="submit" name="page" value="<?= $pageSuiv ?>">Page Suivante</button>
        <?php endif; ?>
        <input type="submit" name="" value="Rechercher">

      </form>

      <section class="section_annonces">
        <div class="">
          <?php foreach ($annonces as $value) : ?>
            <article class="annonce">
              <header>
                <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/512x512/plain/user.png<?php /* $value->getUser()->getImageProfil() */ ?>" alt="Photo de profil de l'utilisateur">
                <h2><a href="annonce.ctrl.php?idAnnonce=<?= $value->getId() ?>"><?= $value->getNom() ?></a></h2>
              </header>
              <p><?= mb_substr($value->getDescription(),0,100,"utf-8") ?> <?php if(strlen($value->getDescription()) > 100){ echo"...";}  ?></p>
              <p class="date"><?= $value->getDateService() ?></p>
              <form class="" action="annonce.ctrl.php" method="get">
                <button type="submit" name="idAnnonce" value="<?= $value->getId() ?>">Voir le détail</button>
              </form>
              <form class="" action="listeAnnonces.ctrl.php" method="get">
                <button class="boutonCategorie" type="submit" name="categorie" value="<?= $value->getCategorie()->getNom() ?>"><?= $value->getCategorie()->getNom() ?></button>
              </form>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

    </section>

    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
