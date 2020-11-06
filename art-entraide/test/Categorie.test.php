<?php
// Acces aux classe
require_once(__DIR__.'/../model/Categorie.class.php');
//Categorie(id, nom)


try {
  // ===== création categorie ==== //
  print("Creation d'un categorie : ");
  $annonce = new Categorie(1, "Bricolage");
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
  $expected = "Bricolage";
  if($value != $expected){
    throw new Exception("nom incorrecte : $value, attendue $expected");
  }
  printf(" OK\n");

  print("Test passé avec succes\n");

}
catch (\Exception $e) {
  exit("Erreur sur Annonce : " . $e->getMessage());
}


?>
