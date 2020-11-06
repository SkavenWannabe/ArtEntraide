<?php
// Acces aux classe
require_once(__DIR__.'/../model/Annonce.class.php');

try {
  // ===== création annonce ==== //
  print("Creation d'un annonce : ");
  $annonce = new Annonce(1, "toto", "description de toto", "habite ici", "06/11/20", "15/11/20", 1, 5);
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

  // --- Test date creation --- //
  $value = $annonce->getDateCreation();
  $expected = "06/11/20";
  if($value != $expected){
    throw new Exception("Date de création incorrecte : $value, attendue $expected");
  }

  // --- Test date service --- //
  $value = $annonce->getDateService();
  $expected = "15/11/20";
  if($value != $expected){
    throw new Exception("Date du service incorrecte : $value, attendue $expected");
  }

  // --- Test idCreateur --- //
  $value = $annonce->getIdCreateur();
  $expected = 1;
  if($value != $expected){
    throw new Exception("id_createur incorrecte : $value, attendue $expected");
  }


  // --- Test idCategorie --- //
  $value = $annonce->getIdCategorie();
  $expected = 5;
  if($value != $expected){
    throw new Exception("id_categorie incorrecte : $value, attendue $expected");
  }
  printf(" OK\n");

  print("Test passé avec succes\n");

}
catch (\Exception $e) {
  exit("Erreur sur Annonce : " . $e->getMessage());
}


?>
