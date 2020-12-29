<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Modifier votre compte</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/modifCompte.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>

  <body>
    <?php include_once(__DIR__."/header.php"); ?>

    <section>
      <h2>Modifier votre compte</h2>

      <form class="inscription" action="/controler/inscription.ctrl.php" method="post">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="<?= $user->getNom() ?>">

        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" value="<?= $user->getPrenom() ?>">

        <label for="p_adresse">Adresse postale</label>
        <input type="text" name="p_adresse" id="p_adresse" value="<?= $user->getAdresse() ?>">

        <label for="email">Adresse email</label>
        <input type="email" name="email" id="email" value="<?= $user->getEmail() ?>">

        <label for="passwd">Mot de passe</label>
        <input type="password" name="passwd" id="passwd">

        <label for="passwd">Confirmation du mot de passe</label>
        <input type="password" name="passwdverif" id="passwdverif">

        <button type="submit" name="valider">Valider</button>
      </form>
    </section>

    <?php include_once(__DIR__."/footer.php"); ?>
  </body>
</html>
