<?php

  if (!isset($categories)){
    $categories = [ "Catégories introuvables"];
  }
// cause erreur à rajouter dans le else
// <img src="<?= $user->getImage() >" alt="Photo de profil">
// var_dump($user);
 ?>

<header>
  <div class="">
    <a href="https://<?= $_SERVER['SERVER_NAME'] ?>:8080/">
      <img src="/view/design/logo2.png" alt="Logo de l'art de l'entraide">
    </a>
      <!-- <h1>L'art de l'entraide</h1> -->
    <!-- </div> -->
    <nav class="headerbar">
      <ul>
        <form class="" action="listeAnnonces.ctrl.php" method="get">
          <li><input type="search" placeholder="Rechercher une annonce" name="motcle" value=""></li>
        </form>
          <li>
              <div class="dropdown">
                <button onclick="categorieDropDown()" class="dropbtn">Catégories</button>
                <div id="catDd" class="dropdown-content">
                  <?php foreach ($nomCategories as $nom) :?>
                    <a href="listeAnnonces.ctrl.php?categorie=<?=$nom?>"><?=$nom?></a>
                  <?php endforeach; ?>
                </div>
              </div>
          </li>
        <form class="" action="menu.ctrl.php" method="get">
          <?php if ($user == NULL): ?>
            <li><button type="submit" name="etat" value="connexion">Se connecter</button></li>
            <li><button type="submit" name="etat" value="creation">Créer un compte</button></li>
          <?php else: ?>
            <?php if ($user instanceof Certificateur): ?>
              <li><button type="submit" name="etat" value="certification">Certifier</button></li>
            <?php else: ?>
              <li><button type="submit" name="etat" value="creationAnnonce">Créer une annonce</button></li>
            <?php endif; ?>
            <li><button type="submit" name="etat" value="profil"><?= $user->getPrenom() ?></button></li>
          <?php endif; ?>
        </form>
      </ul>
    </nav>
  </div>

  <nav class="ariane">
    <ul>
      <li><a href="/controler/start.ctrl.php">Accueil</a></li>
      <?php switch ($vue): ?>
<?php case "annonce.view.php": ?>
        <li><a href="/controler/listeAnnonces.ctrl.php">Recherche d'une annonce</a></li>
        <li><?= mb_substr($annonce->getNom(),0,70,"utf-8")?> <?php if(strlen($annonce->getNom()) > 70){ echo"...";} ?></li>
        <?php break; ?>
<?php case "certif.view.php": ?>
        <li>Certifier</li>
        <?php break; ?>
<?php case "cgu.view.php": ?>
        <li>Condition générales d'utilisation</li>
        <?php break; ?>
<?php case "confidentialite.view.php": ?>
        <li>Politique de confidentialité</li>
        <?php break; ?>
<?php case "connexion.view.php": ?>
        <li>Connexion</li>
        <?php break; ?>
<?php case "contact.view.php": ?>
        <li>Contact</li>
        <?php break; ?>
<?php case "conversation.view.php": ?>
        <li><a href="annonce.ctrl.php?idAnnonce=<?= $annonce->getId() ?>"><?= $annonce->getNom() ?></a></li>
        <li>Conversation avec <?= $nomDestinataire ?></li>
        <?php break; ?>
<?php case "creationAnnonce.view.php": ?>
        <li>Création d'une annonce</li>
        <?php break; ?>
<?php case "description.view.php": ?>
        <li>Qui sommes nous</li>
        <?php break; ?>
<?php case "FAQ.view.php": ?>
        <li>FAQ</li>
        <?php break; ?>
<?php case "inscription.view.php": ?>
        <li>Inscription</li>
        <?php break; ?>
<?php case "legal.view.php": ?>
        <li>Mentions Légales</li>
        <?php break; ?>
<?php case "listeAnnonces.view.php": ?>
        <li>Recherche d'une annonce</li>
        <?php break; ?>
<?php case "modifAnnonce.view.php": ?>
        <li><a href="annonce.ctrl.php?idAnnonce=<?= $annonce->getId() ?>"><?= $annonce->getNom() ?></a></li>
        <li>Modification de <?= $annonce->getNom() ?></li>
        <?php break; ?>
<?php case "modifCompte.view.php": ?>
        <li><a href="/controler/menu.ctrl.php?etat=profil">Profil</a></li>
        <li>Modification de mon profil</li>
        <?php break; ?>
<?php case "profil.view.php": ?>
        <li>Profil</li>
        <?php break; ?>
<?php case "sesAnnonces.view.php": ?>
        <li><a href="/controler/menu.ctrl.php?etat=profil">Profil</a></li>
        <li>Voir ses annonces</li>
      <?php endswitch; ?>

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
    <output class="message">
      <?= $message ?>
    </output>
  <?php endif; ?>
</header>

<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function categorieDropDown() {
  document.getElementById("catDd").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
