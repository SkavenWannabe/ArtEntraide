<?php
// Acces aux classe
require_once(__DIR__.'/../model/Annonce.class.php');

try {
  // ----- création annonce ---- //
  print("Creation d'un annonce : ");
  $annonce = new Annonce(1, "toto", "description de toto")

} catch (\Exception $e) {

}


?>
