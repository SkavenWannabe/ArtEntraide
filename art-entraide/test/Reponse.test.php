<?php
// Acces aux classe
require_once(__DIR__.'/../model/Reponse.class.php');
//Reponse(id_annonce, id_repondeur, id_message)

try {
  // ===== création reponse ==== //
  print("Creation d'un reponse : ");
  $annonce = new Reponse(1, 2, 3);
  printf("OK\n");

  // ===== Test des attributs ==== //
  print("Test des attributs : ");
  // --- Test id annonce--- //
  $value = $annonce->getIdAnnonce();
  $expected = 1;
  if($value != $expected){
    throw new Exception("id annonce incorrecte : $value, attendue $expected");
  }

  // --- Test id repondeur --- //
  $value = $annonce->getIdRepondeur();
  $expected = 2;
  if($value != $expected){
    throw new Exception("id repondeur incorrecte : $value, attendue $expected");
  }

  // --- Test id message --- //
  $value = $annonce->getIdMessage();
  $expected = 3;
  if($value != $expected){
    throw new Exception("id message incorrecte : $value, attendue $expected");
  }
  printf(" OK\n");

  print("Test passé avec succes\n");

}
catch (\Exception $e) {
  exit("Erreur sur Annonce : " . $e->getMessage());
}

?>
