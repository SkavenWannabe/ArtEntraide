<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Vos annonces</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/annonce.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>

  <body>
    <?php include_once(__DIR__."/header.php"); ?>

    <section class="section_annonces">
      <div class="">
        <?php foreach ($annonces as $key => $value) : ?>
          <article class="annonce">
            <header>
              <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/512x512/plain/user.png<?php /* $value->getUser()->getImageProfil() */ ?>" alt="Photo de profil de l'utilisateur">
              <h2><?= $value->getNom() ?></h2>
            </header>
            <p><?= $value->getDescription() ?></p>
            <p class="date"><?= $value->getDateService() ?></p>
            <form class="" action="annonce.ctrl.php" method="get">
              <button type="submit" name="idAnnonce" value="<?= $value->getId() ?>">Voir le détail</button>
            </form>
            <form class="" action="listeAnnonces.ctrl.php" method="get">
              <button class="boutonCategorie" type="submit" name="idCategorie" value="<?= $value->getCategorie()->getId() ?>"><?= $value->getCategorie()->getNom() ?><?php /*$value->getIdCategorie() */ ?></button>
            </form>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <?php include_once(__DIR__."/footer.php"); ?>
  </body>
</html>