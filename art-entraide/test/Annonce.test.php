<?php
// Acces aux classe
require_once(__DIR__.'/../model/Annonce.class.php');

try {
  // ===== création annonce ==== //
  print("Creation d'un annonce : ");
  $annonce = new Annonce(1, "toto", "description de toto", "habite ici", 12);
  printf("OK\n");

  // ===== Test des attributs ==== //
  print("Test des attributs : ");
  // --- Test id --- //
  $value = $annonce->getId();
  $expected = 1;
  if($value != $expected){
    throw new Exception("id incorrecte : $value, attendue $expected");
  }

  // --- Test nom --- //
  $value = $annonce->getNom();
  $expected = "toto";
  if($value != $expected){
    throw new Exception("nom incorrecte : $value, attendue $expected");
  }

  // --- Test descrption --- //
  $value = $annonce->getDescription();
  $expected = "description de toto";
  if($value != $expected){
    throw new Exception("description incorrecte : $value, attendue $expected");
  }

  // --- Test adresse --- //
  $value = $annonce->getAdresse();
  $expected = "habite ici";
  if($value != $expected){
    throw new Exception("adresse incorrecte : $value, attendue $expected");
  }

  // --- Test idCreateur --- //
  $value = $annonce->getIdCreateur();
  $expected = 12;
  if($value != $expected){
    throw new Exception("id_createur incorrecte : $value, attendue $expected");
  }
  printf(" OK\n");

} catch (\Exception $e) {
  exit("Erreur sur Annonce : " . $e->getMessage());
}


?>
