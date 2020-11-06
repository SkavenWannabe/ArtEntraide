<?php
// Acces aux classe
require_once(__DIR__.'/../model/Message.class.php');
//Message(id, contenue, date_message, id_auteur)

try {
  // ===== création message ==== //
  print("Creation d'un message : ");
  $annonce = new Message(1, "ceci est un message", "06/11/20", 5);
  printf("OK\n");

  // ===== Test des attributs ==== //
  print("Test des attributs : ");
  // --- Test id --- //
  $value = $annonce->getId();
  $expected = 1;
  if($value != $expected){
    throw new Exception("id incorrecte : $value, attendue $expected");
  }

  // --- Test contenue --- //
  $value = $annonce->getContenue();
  $expected = "ceci est un message";
  if($value != $expected){
    throw new Exception("Contenue incorrecte : $value, attendue $expected");
  }

  // --- Test date --- //
  $value = $annonce->getDateMessage();
  $expected = "06/11/20";
  if($value != $expected){
    throw new Exception("Date du message incorrecte : $value, attendue $expected");
  }

  // --- Test id auteur--- //
  $value = $annonce->getIdAuteur();
  $expected = 5;
  if($value != $expected){
    throw new Exception("id auteur incorrecte : $value, attendue $expected");
  }
  printf(" OK\n");

  print("Test passé avec succes\n");

}
catch (\Exception $e) {
exit("Erreur sur Annonce : " . $e->getMessage());
}

?>
