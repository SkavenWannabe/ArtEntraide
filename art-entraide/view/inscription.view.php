<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/inscription.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>
      <div class="">
        <h1>Inscrivez vous et perpétuez l'art de l'entaide</h1>
        <ul>
          <li>Raison 1</li>
          <li>Raison 2</li>
          <li>Raison 3</li>
        </ul>
      </div>

      <form class="inscription" action="inscription.ctrl.php" method="post">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">

        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom">

        <label for="numtel">Numéro de téléphone</label>
        <input type="tel" name="phone" pattern="[0-9]{10}" id="numtel">

        <label for="p_adresse">Adresse postale</label>
        <input type="text" name="p_adresse" id="p_adresse">

        <label for="email">Adresse email</label>
        <input type="email" name="email" id="email">

        <label for="passwd">Mot de passe</label>
        <input type="password" name="passwd" id="passwd">

        <label for="passwd">Confirmation du mot de passe</label>
        <input type="password" name="passwd" id="passwd">

        <button type="submit" name="valider">Valider</button>
      </form>
    </section>

    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
