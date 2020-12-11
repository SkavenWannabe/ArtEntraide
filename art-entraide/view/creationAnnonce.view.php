<!-- Variables à donner à cette vue
$categories : Liste du nom de chaque catégories
$user : Utilisateur connecté
-->
<?php
  if (isset($user)){
    $adresse = $user->getAdresse();
  } else {
    $adresse = "adresse introuvable";
  }
 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Création d'une annonce</title>
    <link rel="stylesheet" href="/view/css/master.css">
  </head>


  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>

      <h2>Créez votre propre annonce</h2>

      <form class="creation_annonce" action="???" method="post">
        <label for="intitule">Intitulé</label>
        <input type="text" name="intitule" id="intitule">

        <label for="categorie">Catégorie</label>
        <select name="categorie" id="categorie">
          <?php foreach ($categories as $key => $value) : ?>
            <option value=""><?= $value ?></option>
          <?php endforeach; ?>
        </select>

        <label for="description">Décrivez le service dont vous avez besoin</label>
        <input type="text" name="description" id="description">

        <label for="lieu">Lieu du service</label>
        <input type="text" name="lieu" id="lieu" value="<?= $user->getAdresse() ?>">

        <label for="date">Quand avez-vous besoin d'aide ?</label>
        <input type="date" name="date" id="date">

        <button type="submit" name="publier">Publier l'annonce</button>
      </form>
    </section>

    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
