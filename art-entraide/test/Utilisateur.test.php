<?php
// Acces aux classe
require_once(__DIR__.'/../model/Utilisateur.class.php');
//Utilisateur(id, nom, prenom, password, adresse)


try {
  // ===== création utilisateur ===== //
  print("Création d'un utilisateur : ");
  $utilisateur = new Utilisateur(1, "4ever", "michel", "michel.4ever@gmail.com", "2night", "bloqué dans les années 80");
  print("OK\n");

  // ===== Test des attributs ===== //
  print("Test des attributs : ");

  // --- Test id --- //
  $value = $utilisateur->getId();
  $expected = 1;
  if ($value != $expected) {
    throw new Exception("Id incorrectt : $value, attendu $expected\n");
  }

  // --- Test nom --- //
  $value = $utilisateur->getNom();
  $expected = "4ever";
  if ($value != $expected) {
    throw new Exception("Nom incorrect : $value, attendu $expected\n");
  }

  // --- Test prénom --- //
  $value = $utilisateur->getPrenom();
  $expected = "michel";
  if ($value != $expected) {
    throw new Exception("Prénom incorrectt : $value, attendu $expected\n");
  }

  // --- Test Email --- //
  $value = $utilisateur->getEmail();
  $expected = "michel.4ever@gmail.com";
  if ($value != $expected) {
    throw new Exception("Email incorrectt : $value, attendu $expected\n");
  }

  // --- Test password --- //
  $value = $utilisateur->getPassword();
  $expected = "2night";
  if ($value != $expected) {
    throw new Exception("Password incorrectt : $value, attendu $expected\n");
  }

  // --- Test adresse --- //
  $value = $utilisateur->getAdresse();
  $expected = "bloqué dans les années 80";
  if ($value != $expected) {
    throw new Exception("Adresse incorrectt : $value, attendu $expected\n");
  }

  // --- Test reputation --- //
  $value = $utilisateur->getReputation();
  $expected = 0;
  if ($value != $expected) {
    throw new Exception("Reputation incorrectt : $value, attendu $expected\n");
  }

  // --- Test certif --- //
  $value = $utilisateur->getCertif();
  $expected = false;
  if ($value != $expected) {
    throw new Exception("certif incorrectt : $value, attendu $expected\n");
  }

  $utilisateur->setCertif(true);

  $value = $utilisateur->getCertif();
  $expected = true;
  if ($value != $expected) {
    throw new Exception("certif incorrectt : $value, attendu $expected\n");
  }


  print("OK\n");

  print("Test passé avec succes\n");

}
catch (Exception $e) {
  exit("\nErreur: ".$e->getMessage()."\n");
}


?>
