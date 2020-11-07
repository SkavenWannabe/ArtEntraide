<!--
$annonces : Variable contenant les deux annonces à afficher en page d'accueil
 -->

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>L'art de l'entraide</title>
    <link rel="stylesheet" href="/view/design/style.css">
  </head>
  <body>
    <?php include_once(__DIR__."/header.php"); ?>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <section class="section_annonces">
      <div class="">
        <?php foreach ($annonces as $key => $value) : ?>
          <article class="annonce">
            <img src="<?= $value->getUser()->getImageProfil() ?>" alt="Photo de profil de l'utilisateur">
            <h2><?= $value->getIntitule() ?></h2>
            <p><?= $value->getDescription() ?></p>
            <p><?= $value->getDate() ?></p>
            <form class="" action="annonce.ctrl.php" method="get">
              <button type="submit" name="idAnnonce" value="<?= $value->getId() ?>">Voir le détail</button>
              <button type="submit" name="idCategorie" value="<?= $value->getCategorie()->getId() ?>"><?= $value->getCategorie()->getNom() ?></button>
            </form>
          </article>
        <?php endforeach; ?>
      </div>
      <form class="" action="listeAnnnonces.ctrl.php" method="get">
        <button type="submit" name="" value="">Voir plus</button>
      </form>
    </section>

    <?php include_once(__DIR__."/footer.php"); ?>
  </body>
</html>
