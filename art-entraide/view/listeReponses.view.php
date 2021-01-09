<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Conversation</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/listeReponses.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>


  <body>

    <?php include_once(__DIR__."/header.php"); ?>

    <section>
      <section class="section_reponses">

        <?php foreach ($listeMessage as $message): ?>
          <article class="reponse">
            <header>
              <h2><?= $message[0] ?></h2> <!--Nom de l'annonce-->
              <h3><?= $message[2] ?> <?= $message[3] ?></h3> <!--Prénom Nom du mec-->
            </header>

            <p><?= $message[1]->getContenue() ?></p> <!-- Actual message -->

            <footer>
              <form class="" action="reponseAnnonce.ctrl.php" method="get">
                <input type="hidden" name="annonceId" value="<?= $message[4] ?>">
                <input type="hidden" name="idUser" value="<?= $message[5] ?>">
                <button type="submit" name="action" value="repondre">Répondre</button>
              </form>
              <?php if($message[5] != $user->getId()): ?>
                <form class="" action="validAnnonce.ctrl.php" method="get" onsubmit="return confirm('Voulez vous vraiment validez cette annonce ?')">
                  <input type="hidden" name="annonceId" value="<?= $message[4] ?>">
                  <input type="hidden" name="idUser" value="<?= $message[5] ?>">
                  <button type="submit" name="action" value="repondre">Valider</button>
                </form>
              <?php endif; ?>
            </footer>

          </article>
        <?php endforeach; ?>
      </section>
    </section>

    <?php include_once(__DIR__."/footer.php"); ?>
  </body>
</html>
