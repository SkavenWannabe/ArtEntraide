<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Nous contacter</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>


  <body>

    <?php include_once(__DIR__."/header.php"); ?>



    <section>
      <h1>Comment nous contactez ?</h1>
      <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>

      <form class="Contact" action="" method="post">
        <label for="sujet">Sujet</label>
        <input type="text" name="sujet" id="sujet">

        <label for="mail">Adresse mail</label>
        <input type="text" name="prenom" id="prenom">

        <label for="corp">Question</label>
        <input type="text" name="corp" id="corp">

        <button type="submit" name="envoyer">Envoyer</button>

    </section>

    <?php include_once(__DIR__."/footer.php"); ?>
  </body>
</html>
