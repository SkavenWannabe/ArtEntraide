<?php
// Acces aux classe
require_once(__DIR__.'/../model/Certificateur.class.php');
//Certificateur(id, email, password, nom, prenom)


try {
  // ===== création utilisateur ===== //
  print("Création d'un certificateur : ");
  $certificateur = new Certificateur(1, "michel.4ever@gmail.com", "2night", "4ever", "michel");
  print("OK\n");

  // ===== Test des attributs ===== //
  print("Test des attributs : ");

  // --- Test id --- //
  $value = $certificateur->getId();
  $expected = 1;
  if ($value != $expected) {
    throw new Exception("Id incorrectt : $value, attendu $expected\n");
  }

  // --- Test nom --- //
  $value = $certificateur->getNom();
  $expected = "4ever";
  if ($value != $expected) {
    throw new Exception("Nom incorrect : $value, attendu $expected\n");
  }

  // --- Test prénom --- //
  $value = $certificateur->getPrenom();
  $expected = "michel";
  if ($value != $expected) {
    throw new Exception("Prénom incorrectt : $value, attendu $expected\n");
  }

  // --- Test Email --- //
  $value = $certificateur->getEmail();
  $expected = "michel.4ever@gmail.com";
  if ($value != $expected) {
    throw new Exception("Email incorrectt : $value, attendu $expected\n");
  }

  // --- Test password --- //
  $value = $certificateur->getPassword();
  $expected = "2night";
  if ($value != $expected) {
    throw new Exception("Password incorrectt : $value, attendu $expected\n");
  }

  print("OK\n");

  print("Test passé avec succes\n");

}
catch (Exception $e) {
  exit("\nErreur: ".$e->getMessage()."\n");
}


?>
