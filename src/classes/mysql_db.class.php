    <?php

class mysql_db {
  private $connection = NULL;
  private $result = NULL;
  private $counter=NULL;
  
 
 
  public function __construct($host=NULL, $dbname=NULL, $user=NULL, $pw=NULL){	
	$this->connection = mysql_connect($host,$user,$pw,TRUE);
  	mysql_select_db($dbname, $this->connection);
  }
 
  public function disconnect() {
    if (is_resource($this->connection))				
        mysql_close($this->connection);
  }
 
  public function query($query) {
  	$this->result=mysql_query($query,$this->connection);
  	$this->counter=NULL;
  }
 
  public function fetchRow() {
  	return mysql_fetch_assoc($this->result);
  }
  
    public function fetchArray() {
  	return mysql_fetch_array($this->result);
  }
  
    public function fetchNumRows() {
  	return mysql_num_rows($this->result);
  }
  
  public function queryResult() {
  	return $this->result;
  }
 
  public function count() {
  	if($this->counter==NULL && is_resource($this->result)) {
  		$this->counter=mysql_num_rows($this->result);
  	}
 
	return $this->counter;
  }
}
?>