<!-- Variables à donner à cette vue
$categories : Liste du nom de chaque catégories
$user : Utilisateur connecté
 -->
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <title><?= $titre ?></title>
    <link rel="stylesheet" href="/view/design/style.css">
  </head>

  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>
      <form class="login" action="???" method="post">
        <label for="pseudo">Pseudonyme</label>
        <input type="text" name="pseudo" id="pseudo">

        <label for="password">Mot de passe</label>
        <input type="text" name="password" id="pasword">

        <label for="test">test</label>
        <input type="text" name="test" id="test">

        <button type="submit" name="connexion">Connexion</button>
      </form>
    </section>
    <section>
      <div class="g-signin2" data-onsuccess="onSignIn"></div>
    </section>

    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
