<!-- Variables à donner à cette vue
$categories : Liste du nom de chaque catégories
$user : Utilisateur connecté
-->

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title>Modification d'une annonce</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/creationAnnonce.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>


  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>

      <h2>Modifiez propre annonce</h2>

      <p>Champs obligatoires <em>*</em></p>
      <form class="creation_annonce" action="modifAnnonce.ctrl.php" method="post">
        <section>
          <div class="">
            <label>Type d'annonce :</label>
            <fieldset>
              <input type="radio" id="demande" name="type" value="demande" <?= ($annonce->getEstDemande() ? "checked" : "") ?>>
              <label for="demande">Je demande un service</label><br>
              <input type="radio" id="proposition" name="type" value="proposition" <?= ($annonce->getEstDemande() ? "" : "checked") ?>>
              <label for="proposition">Je propose un service</label>
            </fieldset>
          </div>
          <div class="">
            <label for="intitule">Intitulé de votre annonce :<em>*</em></label>
            <input type="text" name="intitule" id="intitule" value="<?=$annonce->getNom() ?>" required>
          </div>

          <div class="">
            <label for="description">Détail de votre annonce :<em>*</em></label>
            <textarea name="description" id="description"><?=$annonce->getDescription() ?></textarea>
          </div>
        </section>



        <section>
          <div class="">
            <label for="categorie">Catégorie de votre annonce :<em>*</em></label>
            <select name="categorie" id="categorie" required>
              <?php foreach ($nomCategories as $key => $value) : ?>
                <?php if ($annonce->getCategorie()->getNom() == $value): ?>
                  <option value="<?= $value ?>" selected><?= $value ?></option>
                <?php else: ?>
                  <option value="<?= $value ?>"><?= $value ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="">
            <label for="lieu">Où se situe le service à effectuer</label>
            <input type="text" name="lieu" id="lieu" value="<?= $annonce->getAdresse() ?>">
          </div>

          <div class="">
            <label for="date">À quel date ce service aura lieu ?</label>
            <input type="date" name="date" id="date" value="<?= $annonce->getDateService() ?>">
          </div>
        </section>


        <div class="confirmation">
          <a href="/controler/menu.ctrl.php?etat=profil">Annuler</a>
          <button type="submit" name="valider">Valider</button>
        </div>
        <input type="hidden" name="idAnnonce" value="<?= $annonce->getId() ?>">

      </form>
    </section>

    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
