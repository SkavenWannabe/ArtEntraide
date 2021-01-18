<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Nous contacter</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>


  <body>

    <?php include_once(__DIR__."/header.php"); ?>



    <section>
      <h1>Comment nous contacter ?</h1>
      <p>
        Vous avez un problème à signaler, une amélioration à proposer, des remarques, de l'aide à demander ? Écrivez-nous !<br>
        Remplissez le formulaire ci-dessous, expliquez la situation, et nous vous répondrons par email dès que possible.
      </p>
      <form class="Contact" action="contact.ctrl.php" method="post">
        <label for="sujet">Objet de votre message :</label><br>
        <input type="text" name="sujet" id="sujet" size="40" placeholder="J'ai un problème..."><br>

        <label for="email">Votre adresse email :</label><br>
        <input type="email" name="email" id="email" size="40"  placeholder="alice.smith@exemple.com"><br>

        <label for="msg">Votre message :</label><br>
        <textarea name="message" rows="8" cols="80" id="msg" placeholder="Voici la situation ..."></textarea><br>

        <button type="submit" name="envoyer" title="Envoyer votre message">Envoyer</button>
      </form>
    </section>

    <?php include_once(__DIR__."/footer.php"); ?>
  </body>
</html>
