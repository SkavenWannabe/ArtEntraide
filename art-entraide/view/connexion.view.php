<!-- Variables à donner à cette vue
$categories : Liste du nom de chaque catégories
$user : Utilisateur connecté
 -->
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="774283535077-6qgj97q5b1ngrcs6p4ig79ppslr67rv0.apps.googleusercontent.com">
    <script type="text/javascript">
      function onSignIn(googleUser) {
      var profile = googleUser.getBasicProfile();
      console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
      console.log('Name: ' + profile.getName());
      console.log('Image URL: ' + profile.getImageUrl());
      console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
      }
    </script>

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
          <form class="login" action="login.ctrl.php" method="post">
            <label for="pseudo">Adresse mail</label>
            <input type="text" name="pseudo" id="pseudo" required>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>

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
