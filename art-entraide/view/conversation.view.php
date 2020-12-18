<!-- Variables à donner à cette vue
  $user: user connecté
  $nomDestinataire: nom du l'interlocuteur
  $annonce
  $messages : Liste des messages
 -->
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Votre profil</title>
    <link rel="stylesheet" href="/view/css/master.css">
  </head>

  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>

      <h2>Conversation avec <?= $nomDestinataire ?> pour l'annonce <?= $annonce->getNom() ?></h2>


      <section class="section_messsages">
        <?php foreach ($messages as $key => $value): ?>
          <?php if ($value->getIdAuteur() == $user->getId()): ?>
            <p class="envoye">
          <?php else: ?>
            <p class="recu">
          <?php endif; ?>
            <?= $value->getContenue() ?>
          </p>
        <?php endforeach; ?>
      </section>


    </section>


    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
