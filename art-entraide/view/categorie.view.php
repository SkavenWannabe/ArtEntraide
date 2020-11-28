<!--
  $categories = array avec les objets catégories
 -->

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Catégories</title>
    <link rel="stylesheet" href="/view/css/master.css">
    <link rel="stylesheet" href="/view/css/categorie.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>
      <form class="" action="--Controleur--" method="get">
        <?php foreach ($categories as $key => $value) : ?>
          <button type="submit" name="idCategorie" value="<?=$value->getId()?>">
            <?=$value->getNom()?>
          </button>
        <?php endforeach; ?>
      </form>
    </section>

    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
