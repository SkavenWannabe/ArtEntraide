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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TimelineLite.min.js" integrity="sha512-I0VFyPo7hdM7YrEbQ0pvX4bX2904k0+B19u/xBrPrQoMprfcSnIDfGFD8kP52GbAhwtDjkEVhXlQvj8+vkJyew==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js" integrity="sha512-8Wy4KH0O+AuzjMm1w5QfZ5j5/y8Q/kcUktK9mPUVaUoBvh3QPUZB822W/vy7ULqri3yR8daH3F58+Y8Z08qzeg==" crossorigin="anonymous"></script>

    <?php include_once(__DIR__."/header.php"); ?>

    <section class="section_annonces">
      <div class="">
        <?php foreach ($annonces as $key => $value) : ?>
          <article class="annonce">
            <header>
              <!-- Icône d'utilisateur -->
              <div class="user">
                <img class="pp" src="/view/design/default-user.png<?php /* $value->getUser()->getImageProfil() */ ?>" alt="Photo de profil de l'utilisateur">
                <?php if ($value->getCreateur()->getCertif()): ?>
                  <img class="certif" src="/view/design/certif-icon.svg" alt="">
                <?php endif; ?>
              </div>
              <!-- Titre de l'annonce -->
              <div class="title">
                <h2><a href="annonce.ctrl.php?idAnnonce=<?= $value->getId() ?>"><?= mb_substr($value->getNom(),0,50,"utf-8") ?><?php if(strlen($value->getNom()) > 50){ echo"...";}  ?></a></h2>
              </div>
            </header>
            <!-- Description -->
            <p><?= mb_substr($value->getDescription(),0,100,"utf-8") ?> <?php if(strlen($value->getDescription()) > 100){ echo"...";}  ?></p>
            <!-- Encadré indiquant le type (proposition/demande) -->

            <form class="" action="listeAnnonces.ctrl.php" method="get">
              <button class="boutonType" type="submit" name="type" value="<?= ($value->getEstDemande() ? "demande" : "proposition") ?>"><?= ($value->getEstDemande() ? "Demande" : "Proposition") ?></button>
            </form>
            <!-- Bouton "Voir le détail" -->
            <form class="" action="annonce.ctrl.php" method="get">
              <button type="submit" name="idAnnonce" value="<?= $value->getId() ?>">Voir le détail</button>
            </form>
            <!-- Bandeau de catégorie en bas -->
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
