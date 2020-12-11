<!-- Variables à donner à cette vue
$annonce = Objet annonce concernée
$nomAuteur = nom de l'auteur de l'annonce
$nomCategorie = nom de la catégorie de l'annonce
 -->
 <?php
  include_once(__DIR__."/../model/Annonce.class.php");

  if(!isset($annonce)){
    $annonce = getAnnonceErreur();
  }
  if(!isset($nomAuteur)){
    $nomAuteur = "nom de l'auteur introuvable";
  }
  if(!isset($nomCatégorie)){
    $nomCatégorie = "nom de la catégorie introuvable";
  }

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title><?= $titre ?></title>
    <link rel="stylesheet" href="/view/css/master.css">
  </head>

  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>
      <header>
        <h2>Annonce de <?= $nomAuteur ?> : <?= $annonce->getNom() ?></h2>
      </header>

      <section>
        <div>
          <p>Catégorie : <?= $nomCategorie ?></p>
          <p>Date du service : <?= $annonce->getDateService() ?></p>
          <p>Lieu du service : <?= $annonce->getAdresse() ?></p>
        </div>

        <div>
          <h3>Description de l'annonce</h3>
          <p><?= $annonce->getDescription() ?></p>
        </div>
      </section>

      <form class="" action="--- Controleur adapté ---" method="post">
        <button type="button" name="action" value="repondre">Répondre à l'annonce</button>
        <button type="button" name="action" value="proposerEchange">Proposer un échange de sevice</button>
      </form>
    </section>

    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
