<?php

class mysql_PessoaDao{
  private $database = null;
  private $server   = null;
  private $user     = null;
  private $password = null;
  private $conn     = null;

public function connect(){
  $this->database = "info";
  $this->server   = "localhost";
  $this->user     = "root";
  $this->password = "root";
  $this->conn = mysql_connect($this->server,$this->user,$this->password);
		
  mysql_select_db($this->database, $this->conn) or die( "Não foi possível conectar ao banco MySQL");
  if($this->conn != null){
    echo "Conectado na base ".$this->database."</br>";
  }else{
    disconnect();
  }
}

public function save(){
  $start = time(); 
  $id = 1;
  for($i=0;$i<1000;$i++){
    $query = "insert into pessoa(id,nome) VALUES(". $id .",'Teste')";
	mysql_query($query);
	$id++;
  }
  $total = time() - $start;
  echo "Tempo total : ".$total." segundos</br>";   
}

public function deleteAll(){
  $query = "delete from pessoa";
  mysql_query($query);
}

public function selectItemsCount(){
  $query = mysql_query("select * from pessoa");
  $total = mysql_num_rows($query);
  echo "Total de registros inseridos : ".$total."</br>";  
}

public function disconnect(){
 mysql_close($this->conn);
 exit;
}


}  
  
?>