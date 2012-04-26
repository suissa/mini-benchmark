<?php
  include 'mysql_server.php';
  
  $client_mysql = new mysql_PessoaDao();
  $client_mysql-> connect();
  $client_mysql-> deleteAll();
  $client_mysql-> save();
  $client_mysql-> selectItemsCount();
  $client_mysql-> disconnect();
?>