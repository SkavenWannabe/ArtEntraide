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
    <link rel="stylesheet" href="/view/css/conversation.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300;400;500;700;800&display=swap" rel="stylesheet">
  </head>

  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>

      <h2>Conversation avec <?= $nomDestinataire ?> - annonce :  <?= $annonce->getNom() ?></h2>


      <section class="section_messages">
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


      <footer>
        <form class="" action="creationMessage.ctrl.php" method="post">
          <textarea type="text" name="contenu" placeholder="Votre message ici" required></textarea>
          <input type="hidden" name="annonceId" value="<?= $annonce->getId() ?>">
          <input type="hidden" name="id_repondeur" value="<?= $id_repondeur ?>">
          <button type="submit">Envoyer</button>
        </form>
      </footer>
    </section>


    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
