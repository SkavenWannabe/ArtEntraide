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
        <?php if (empty($listeMessage)): ?>
          <h2>Vous n'avez pas encore de discussion.</h2>

        <?php else: ?>
          <?php foreach ($listeMessage as $message): ?>
            <article class="reponse">
              <header>
                <h3>Annonce de <?= $message[6] . $message[7] ?> : <?= $message[0]->getNom() ?></h3>
                <p><b>Description :</b> <?= mb_substr($message[0]->getDescription(),0,100,"utf-8")?> <?php if(strlen($message[0]->getDescription()) > 100){ echo"...";}  ?></p></br>
              </header>

              <p><b><?= $message[2] ?> <?= $message[3] ?> </b>: <?= $message[1]->getContenue() ?></p> <!--Prénom Nom du mec + contenu-->

              <footer>
                <form class="" action="reponseAnnonce.ctrl.php" method="get">
                  <input type="hidden" name="annonceId" value="<?= $message[4] ?>">
                  <input type="hidden" name="idUser" value="<?= $message[5] ?>">
                  <button type="submit" name="action" value="repondre">Fil discution</button>
                </form>
                <?php if($message[0]->getCreateur()->getId() == $user->getId()): ?>
                  <?php if($message[0]->getEstActive()): ?>
                    <form class="" action="validAnnonce.ctrl.php" method="get" onsubmit="return confirm('Voulez vous vraiment validez cette annonce ?')">
                      <input type="hidden" name="annonceId" value="<?= $message[4] ?>">
                      <input type="hidden" name="idUser" value="<?= $message[5] ?>">
                      <button type="submit" name="action" value="repondre">Valider</button>
                    </form>
                  <?php else: ?>
                    <button>Déjà Validé</button>
                  <?php endif; ?>
                <?php endif; ?>
              </footer>

            </article>
          <?php endforeach; ?>

        <?php endif; ?>
      </section>
    </section>

    <?php include_once(__DIR__."/footer.php"); ?>
  </body>
</html>
