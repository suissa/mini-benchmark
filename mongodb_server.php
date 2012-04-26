<?php

class mongodb_PessoaDao{
  private $conexao = null;
  private $db = null;
  private $collection = null;

public function connect(){
  $this->conexao = new Mongo();
  $this->db = $this->conexao->dbinfo;
  $this->collection = $this->db->tbpessoa;
  
  if($this->conexao <> null){
    echo "Conectado na base ".$this->db."</br>";
    echo "Coleção ".$this->collection."</br>";	
  }else{
    disconnect();
   }
}

public function save(){
  $start = time(); 
  for($i=0;$i<50000;$i++){
    $obj = array( "title" => "Pessoa_Teste" );
	$this->collection->insert($obj);
  }
  $total = time() - $start;
  echo "Tempo total : ".$total." segundos</br>";    
}

public function deleteAll(){
  $this->collection->remove();
}
	
public function selectItemsCount(){
  $cursor = $this->collection->count();
  echo "Total de registros inseridos : ".$cursor."</br>";
}

public function disconnect(){
  $this->conexao->close();
  exit;
}

}
?>