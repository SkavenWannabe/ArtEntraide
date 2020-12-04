<!-- Variables à donner à cette vue
$categories : Liste du nom de chaque catégories
$user : Utilisateur connecté
 -->
 <?php

   include_once(__DIR__."/../view/placeholderfunction.php");

   if (isset($_GET['id'])){
     $id = $_GET['id'];
   } else {
     $id = 0;
   }

   $titre = getAnnonceTitre($id);
   $description = getAnnonceDescription($id);
   $lieu = getAnnonceLieu($id);
   $date = getAnnonceDate($id);

  ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=" initial-scale=1, width=device-width "/>
    <title><?= $titre ?></title>
    <link rel="stylesheet" href="/view/design/style.css">
  </head>

  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>

      <h2><?= $titre ?></h2>

      <p><?= $lieu ?></p>
      <p><?= $date ?></p>
      <p><?= $description ?></p>

    </section>

    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
