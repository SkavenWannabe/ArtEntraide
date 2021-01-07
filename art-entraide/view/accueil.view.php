<!--
$annonces : array contenant les quatre annonces à afficher en page d'accueil
$user : objet utilsateur connecté, NULL si non connecté
 -->

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>L'art de l'entraide</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/annonce.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>


  <body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TimelineMax.min.js" integrity="sha512-lJDBw/vKlGO8aIZB8/6CY4lV+EMAL3qzViHid6wXjH/uDrqUl+uvfCROHXAEL0T/bgdAQHSuE68vRlcFHUdrUw==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js" integrity="sha512-8Wy4KH0O+AuzjMm1w5QfZ5j5/y8Q/kcUktK9mPUVaUoBvh3QPUZB822W/vy7ULqri3yR8daH3F58+Y8Z08qzeg==" crossorigin="anonymous"></script>

    <?php include_once(__DIR__."/header.php"); ?>

    <section class="section_annonces">
      <div class="">
        <?php foreach ($annonces as $key => $value) : ?>
          <article class="annonce">
            <header>
              <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/512x512/plain/user.png<?php /* $value->getUser()->getImageProfil() */ ?>" alt="Photo de profil de l'utilisateur">
              <h2><a href="annonce.ctrl.php?idAnnonce=<?= $value->getId() ?>"><?= $value->getNom() ?></a></h2>
            </header>
            <p><?= $value->getDescription() ?></p>
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
      <form class="" action="listeAnnonces.ctrl.php" method="get">
        <button type="submit" name="" value="">Voir plus d'annonces</button>
      </form>
    </section>

    <script type="text/javascript" src="/view/js/accueil.js"></script>

    <?php include_once(__DIR__."/footer.php"); ?>
  </body>
</html>
