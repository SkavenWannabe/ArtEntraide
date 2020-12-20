<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Erreur</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>


  <body>

    <?php include_once(__DIR__."/header.php"); ?>

    <section>
      <h1>Une erreur est survenue</h1>
      <img src="design/robot-casse.jpg" alt="Robot cassé">
      <p>
        Nous sommes désolé, une erreur est survenue.<br>
        Nous vous inviton, si l'erreur se reproduit, de nous la decrire dans l'onglet "<a href="/controler/pagesinfos.ctrl.php?page=contact">Nous contacter</a>".<br>
        Sinon retournez à la page d'<a href="/controler/start.ctrl.php">accueil</a>.
      </p>
    </section>

    <?php include_once(__DIR__."/footer.php"); ?>
  </body>
</html>
