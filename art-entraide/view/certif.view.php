<!-- Variables à donner à cette vue
$message
$user = utilisateur actuel
$utilisateurs = array de tout les utilisateurs
 -->

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Certification des utilisateurs</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/certif.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>

  <body>
    <?php include_once(__DIR__."/header.php"); ?>

    <section class="section_utilisateur">
      <div class="">

        <?php foreach ($utilisateurs as $value) : ?>
          <article class="utilisateur">
            <header>
              <div class="">
                <img class="pp" src="/view/design/default-user.png<?php /* $value->getUser()->getImageProfil() */ ?>" alt="Photo de profil de l'utilisateur">
                <?php if ($value->getCertif()): ?>
                  <img class="certif" src="/view/design/certif-icon.svg" alt="">
                <?php endif; ?>
              </div>
              <h2> <?= $value->getPrenom() ?> <h2>
            </header>
            <?php if ($value->getCertif()): ?>
              <p>Certification : Oui</p>
              <?php else: ?>
              <p>Certification : Non</p>
            <?php endif; ?>
            <p>Prenom : <?= $value->getPrenom()?></p>
            <p>Nom : <?= $value->getNom()?></p>
            <p>Email : <?= $value->getEmail()?></p>
              <p>  Adresse : <?= $value->getAdresse()?></p>

            <?php if ($value->getCertif()): ?>
              <footer>
                <form class="" action="/controler/certif.ctrl.php" method="post" onsubmit="return confirm('Voulez vous vraiment enlever la certification de cette utilisateur ?');">
                  <button class="actionCritique" type="submit" name="action" value="suppCertif">Enlever certification</button>
                  <input type="hidden" name="idUsr" value="<?=$value->getId() ?>">
                </form>
              </footer>

            <?php else: ?>

              <footer>
                <form class="" action="/controler/certif.ctrl.php" method="post" onsubmit="return confirm('Voulez vous vraiment certifier cette utilisateur ?');">
                  <button type="submit" name="action" value="addCertif">Certifier</button>
                  <input type="hidden" name="idUsr" value="<?=$value->getId() ?>">
                </form>
              </footer>
            <?php endif; ?>


          </article>
        <?php endforeach;?>
      </div>
    </section>

    <?php include_once(__DIR__."/footer.php"); ?>
  </body>
</html>
