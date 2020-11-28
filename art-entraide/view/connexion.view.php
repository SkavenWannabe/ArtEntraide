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
    <title>Connexion</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/connexion.css">
  </head>

  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>
      <header>
        <h2>Connectez vous à votre compte</h2>
        <p>Pas encore de compte ? Créez en un <a href="/controler/menu.ctrl.php">ici</a></p> <!--//TODO: lien-->
      </header>

      <section>
        <div class="">
          <form class="login" action="???" method="post">
            <label for="pseudo">Adresse mail</label>
            <input type="text" name="pseudo" id="pseudo">

            <label for="password">Mot de passe</label>
            <input type="text" name="password" id="pasword">

            <button type="submit" name="connexion">Connexion</button>
          </form>
        </div>

      <div>
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
      </div>

      </section>

    </section>




    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
