<?php

  if (!isset($categories)){
    $categories = [ "erreur",
                    "les",
                    "catégories",
                    "sont",
                    "introuvables"];
  }
  
 ?>

<header>
  <div class="">
    <a href="http://<?= $_SERVER['SERVER_NAME'] ?>:<?= $_SERVER['SERVER_PORT'] ?>/">
      <img src="/view/design/logo2.png" alt="Logo de l'art de l'entraide">
    </a>
      <!-- <h1>L'art de l'entraide</h1> -->
    <!-- </div> -->
    <nav>
      <ul>
        <form class="" action="menu.ctrl.php" method="post">
          <li><input type="search" placeholder="Rechercher une annonce" name="" value=""></li>
          <li>
              <select name="categorie">
                <?php foreach ($categories as $value) : ?>
                  <option value="<?= $value ?>"><?= $value ?></option>
                <?php endforeach; ?>
              </select>
          </li>
          <li><button type="submit" name="etat" value="connexion">Se connecter</button></li>
          <li><button type="submit" name="etat" value="creation">Créer un compte</button></li>
        </form>
      </ul>
    </nav>
  </div>

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
