
<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "samaaravillas";

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

class database

{
	private $conn;
	
	//public $sql;

//DATABASE CONNECTION

	function __construct($db)
	
	{
		
		$this->conn = $db;
		
	}
	
//Insert Query For Data Inserting

	function insertRecord($table, $feilds, $values)
	
	{
		
		return $this->conn->prepare("INSERT INTO ".$table. "(".$feilds.") VALUES(".$values.")");
		
		$this->con->query($query) or $this->error($this->con->errorno, $this->con->error, $query);
		
	}
	
	public function get_users($que) 
	
	{
		
        return $this->conn->query($que)->fetchAll();
		
    }
	
	public function get_delete($del)
	{
		return $this->conn->query($del);
	}
		
}

?>

