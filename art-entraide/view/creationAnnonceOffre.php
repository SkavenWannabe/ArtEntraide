<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="/view/design/style.css">
  </head>
  <body>
    <?php include_once(__DIR__."/../view/header.php"); ?>

    <section>

      <h2>Création d'une annonce</h2>

      <form class="annonce" action="???" method="post">
        <label for="intitule">Intitulé</label>
        <input type="text" name="intitule" id="intitule">

        <input list="categories" name="categorie" id="categorie">
        <datalist id="categorie">
          <option value="Jardinage">
          <option value="Courses">
          <option value="Bricolage">
          <option value="Peinture">
          <option value="Tuyauterie">
          <option value="Animaux">
          <option value="Baby-sitting">
        </datalist>

        <label for="description">Décrivez le service que vous fournissez</label>
        <input type="text" name="date" id="date">

        <label for="date">Quand proposez-vous ces services ?</label>
        <input type="date" name="date" id="date">

        <button type="submit" name="publier">Publier l'annonce</button>
      </form>
    </section>

    <?php include_once(__DIR__."/../view/footer.php"); ?>
  </body>
</html>
