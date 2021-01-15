<!-- Variables à donner à cette vue
$user
 -->
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Votre profil</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/profil.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>

  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>

      <div>

        <h2>Votre profil</h2>

        <?php if ($user instanceof Utilisateur): ?>
          <form action="voirSesAnnonces.ctrl.php" method="get">
            <button type="submit">Voir mes annonces</button>
          </form>

          <form action="voirSesReponses.ctrl.php" method="post"> <!-- TODO : changer controler -->
            <button type="submit">Voir réponses</button>
          </form>
        <?php endif; ?>


        <p>Nom : <?= $user->getNom() ?> <?= $user->getPrenom() ?></p>
        <p>Adresse mail : <?= $user->getEmail() ?></p>
        <?php if (!($user instanceof Certificateur)): ?>
          <p>Adresse postale : <?= $user->getAdresse() ?></p>
        <?php endif; ?>

        <form action="deconnexion.ctrl.php" method="get">
          <button type="submit" name="deconnexion">Se déconnecter</button>
        </form>

      </div>

      <div class="">
        <form action="actionModif.ctrl.php" method="post">
          <button type="submit" name="action" value="modifCompte">Modifier le compte</button>
        </form>

        <form action="supprimerCompte.ctrl.php" method="get" onsubmit="return confirm('Voulez vous vraiment supprimer votre compte ?\n Cette action est irréversible.');">
          <button class="actionCritique" type="submit" name="supprimerCompte">Supprimer le compte</button>
        </form>
      </div>

    </section>


    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
