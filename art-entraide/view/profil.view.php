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
  </head>

  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>

      <div>

        <h2>Votre profil</h2>

        <form action="voirSesAnnonces.ctrl.php" method="get">
          <button type="submit">Voir ses annonces</button>
        </form>

        <form action="controlerAdapte.ctrl.php" method="post"> <!-- TODO : changer controler -->
          <button type="submit">Voir réponses</button>
        </form>

        <p>Nom : <?= $user->getNom() ?> <?= $user->getPrenom() ?></p>
        <p>Adresse mail : <?= $user->getEmail() ?></p>
        <p>Adresse postale : <?= $user->getAdresse() ?></p>

        <form action="deconnexion.ctrl.php" method="get">
          <button type="submit" name="deconnexion">Se déconnecter</button>
        </form>

      </div>

      <div class="">
        <form action="modifCompte.ctrl.php" method="post">
          <button type="submit" name="supprimerCompte">Modifier le compte</button>
        </form>

        <form action="supprimerCompte.ctrl.php" method="get"> <!-- TODO : popup -->
          <button class="actionCritique" type="submit" name="supprimerCompte">Supprimer le compte</button>
        </form>
      </div>

    </section>


    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
