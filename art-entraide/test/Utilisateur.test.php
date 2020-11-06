<?php
// Acces aux classe
require_once(__DIR__.'/../model/Utilisateur.class.php');

try {
  // ---- création utilisateur ----- //
  print("Création d'un utilisateur : ");
  $utilisateur = new Utilisateur(1, "michel", "4ever", "2night", "bloqué dans les années 80");
  print("OK\n");



} catch (\Exception $e) {

}


?>
