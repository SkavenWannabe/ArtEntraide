<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="/view/design/style.css">
  </head>
  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>
      <header>
        <h2>Inscription</h2>
      </header>
      <form class="inscription" action="???" method="post">
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

        <button type="submit" name="valider">Valider</button>
      </form>
    </section>

    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
