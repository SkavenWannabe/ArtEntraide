<!-- Variables à donner à cette vue
$message
$user = utilisateur actuel
$utilisateurs = array de tout les utilisateurs
 -->

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Certification des utilisateurs</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/detailAnnonce.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>

  <body>
    <?php include_once(__DIR__."/header.php"); ?>

    <section class="section_utilisateur">
      <div class="">

        <?php foreach ($annonces as $key => $value) : ?>
          <article class="utilisateur">
            <img src="/view/design/default-user.png<?php /* $value->getUser()->getImageProfil() */ ?>" alt="Photo de profil de l'utilisateur">
            <h2><<?= $value.getPrenom() $value.getNom() ?></h2>
            <p>
              Certification :
              <?php
                if ($value.getCertif()) {
                  print("Oui");
                }
                else {
                  print("Non");
                }
              ?>
              Prenom : <?= $value.getPrenom()?><br>
              Nom : <?= $value.getNom()?><br>
              Email : <?= $value.getEmail()?><br>
              Adresse : <?= $value.getAdresse()?><br>
            </p>
          </article>
        <?php endforeach;?>

    <?php include_once(__DIR__."/footer.php"); ?>
  </body>
</html>
