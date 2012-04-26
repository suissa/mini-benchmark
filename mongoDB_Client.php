<?php
  include 'mongodb_server.php';
  
  $client_mongo = new mongodb_PessoaDao();
  $client_mongo-> connect();
  $client_mongo-> deleteAll();
  $client_mongo-> save();
  $client_mongo-> selectItemsCount();
  $client_mongo-> disconnect();
?>
