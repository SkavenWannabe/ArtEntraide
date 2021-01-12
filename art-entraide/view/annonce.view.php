<!-- Variables à donner à cette vue
$annonce = Objet annonce concernée
$nomAuteur = nom de l'auteur de l'annonce
$nomCategorie = nom de la catégorie de l'annonce
 -->
 <?php

  if(!isset($nomAuteur)){
    $nomAuteur = "nom de l'auteur introuvable";
  }
  if(!isset($nomCatégorie)){
    $nomCatégorie = "nom de la catégorie introuvable";
  }

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title><?= $annonce->getNom() ?></title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/detailAnnonce.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>

  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>

      <div class="mainAnnonce">

        <div class="topMessage">
          <h2>
          <?php if ($annonce->getEstDemande()): ?>
            <?= $nomAuteur ?> a besoin d'aide le
          <?php else: ?>
            <?= $nomAuteur ?> propose généreusement son aide
          <?php endif; ?>
            le <?= $annonce->getDateService() ?> a <?= $annonce->getAdresse() ?></h2>
        </div>

        <div class="titre">
            <h2><?= $annonce->getNom() ?></h2>

            <form class="" action="/controler/listeAnnonces.ctrl.php" method="get">
              <button class="indicationCategorie" type="submit" name="categorie" value="<?= $nomCatégorie ?>"><?= $nomCatégorie ?></button>
            </form>
        </div>

        <div class="description">
          <p><?= $annonce->getDescription() ?></p>
        </div>

      </div>

      <div class="optionEtranger">


        <?php if (!isset($user) || $annonce->getIdCreateur() != $user->getId()): ?>
          <form class="" action="reponseAnnonce.ctrl.php" method="get">
            <button type="submit" name="action" value="repondre">Répondre à l'annonce</button>
            <input type="hidden" name="annonceId" value="<?= $annonce->getId() ?>">
          </form>

          <form class="" action="/controler/pagesinfos.ctrl.php" method="get">
            <button class="actionCritique" type="submit" name="action" value="repondre">Signaler</button>
            <input type="hidden" name="page" value="contact">
          </form>
        <?php endif; ?>

      </div>

      <div class="optionAuteur">
        <?php if (isset($user) && $annonce->getIdCreateur() == $user->getId()): ?>
          <form action="actionModif.ctrl.php" method="post">
            <button type="submit" name="action" value="modifAnnonce">Modifier l'annonce</button>
            <input type="hidden" name="idAnnonce" value="<?= $annonce->getId() ?>">
          </form>

          <form action="supprimerAnnonce.ctrl.php" method="get" onsubmit="return confirm('Voulez vous vraiment supprimer votre annonce ?\n Cette action est irréversible.');">
            <button class="actionCritique" type="submit">Supprimer l'annonce</button>
            <input type="hidden" name="idAnnonce" value="<?= $annonce->getId() ?>">
          </form>
        <?php endif; ?>
      </div>

    </section>

    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
