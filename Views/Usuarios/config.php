<?php

  require_once 'vendor/autoload.php';

  $clientID = '448317108987-9sg9btvfcntuobq5h5i2kjtqea0t5esp.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost/LIS_PROYECTO/Usuarios/Invitado/';

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");

 
?>