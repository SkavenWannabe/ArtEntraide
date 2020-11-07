<header>
  <!-- <div class=""> -->
    <img src="/view/design/logo2.png" alt="Logo de l'art de l'entraide">
    <!-- <h1>L'art de l'entraide</h1> -->
  <!-- </div> -->
  <nav>
    <ul>
      <form class="" action="index.html" method="post">
        <li><input type="search" placeholder="Rechercher une annonce" name="" value=""></li>
        <li><button type="submit" name="etat" value="categorie">Catégories</button></li>
        <li><button type="submit" name="etat" value="connexion">Se connecter</button></li>
        <li><button type="submit" name="etat" value="creation">Créer un compte</button></li>
      </form>
    </ul>
  </nav>
  <?php if (isset($error) && count($error) != 0) : ?>
    <output class="error">
      <p>Une erreur est survenue : </p>
      <ul>
        <?php foreach ($error as $cause) : ?>
          <li>
            <p><?= $cause ?></p>
          </li>
        <?php endforeach; ?>
      </ul>
    </output>
  <?php endif; ?>
  <?php if (isset($message) && $message != "") : ?>
    <output>
      <?= $message ?>
    </output>
  <?php endif; ?>
</header>
