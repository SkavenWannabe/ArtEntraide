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
    <link rel="stylesheet" href="/view/css/creationAnnonce.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300;400;500;700;800&display=swap" rel="stylesheet">
  </head>


  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>

      <h2>Créez votre propre annonce</h2>

      <p>Champs obligatoires <em>*</em></p>
      <form class="creation_annonce" action="creationAnnonce.ctrl.php" method="post">
        <section>
          <div class="">
            <label for="intitule">Intitulé de votre annonce : <em>*</em></label>
            <input type="text" name="intitule" id="intitule" required>
          </div>

          <div class="">
            <label for="description">Détail de votre annonce : <em>*</em></label>
            <textarea name="description" id="description" required></textarea>
          </div>
        </section>



        <section>
          <div class="">
            <label for="categorie">Catégorie de votre annonce : <em>*</em></label>
            <select name="categorie" id="categorie" required>
              <?php foreach ($nomCategories as $key => $value) : ?>
                <option value="<?= $value ?>"><?= $value ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="">
            <label for="lieu">Localisation</label>
            <input type="text" name="lieu" id="lieu" value="<?= $user->getAdresse() ?>">
          </div>

          <div class="">
            <label for="date">Date du service :</label>
            <input type="date" name="date" id="date">
          </div>
        </section>


        <button type="submit" name="publier">Publier l'annonce</button>
      </form>
    </section>

    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
