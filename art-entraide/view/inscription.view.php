<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Inscription</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/inscription.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>
      <div class="">
        <h1>Inscrivez vous et perpétuez l'art de l'entraide</h1>
        <h2>Cela vous permettera de :</h2>
        <ul>
          <li>Crée des annonces</li>
          <li>Repondre à des annonces</li>
        </ul>
      </div>

      <form class="inscription" action="/controler/inscription.ctrl.php" method="post">
        <label for="nom">Nom <em>*</em></label>
        <input type="text" name="nom" id="nom" placeholder="Lagaffe" required>

        <label for="prenom">Prénom <em>*</em></label>
        <input type="text" name="prenom" id="prenom" placeholder="Gaston" required>

        <label for="p_adresse">Adresse postale</label>
        <input type="text" name="p_adresse" id="p_adresse" placeholder="27 rue des Exemples">

        <label for="email">Adresse email <em>*</em></label>
        <input type="email" name="email" id="email" placeholder="gaston.lagaffe@editions-dupuis.be" required>

        <label for="passwd">Mot de passe <em>*</em></label>
        <input type="password" name="passwd" id="passwd" placeholder="••••••" required>

        <label for="passwd">Confirmation du mot de passe <em>*</em></label>
        <input type="password" name="passwdverif" id="passwdverif" placeholder="••••••" required>

        <button type="submit" name="valider">Créer un compte</button>
      </form>
    </section>

    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
