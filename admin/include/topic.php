<?php  
class topic{

	//DB params
	private $table = "blog_topics";
	private $conn;

	//Myguests properties
	public $topic_id;
	public $topic_name;

	public function __construct($db){
		$this->conn = $db;
	}

	//Read all records
	public function read_all(){
		$sql = "SELECT * FROM $this->table";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	//Read one record
	public function read(){
		$sql = "SELECT * FROM $this->table WHERE topic_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->topic_id);
		$stmt->execute();
		$row = $stmt->fetch();
		$this->topic_name = $row['topic_name'];
	}

	//Add record
	public function add(){
		$sql = "INSERT INTO $this->table SET topic_name = :new_name";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":new_name",$this->topic_name);

		try{
			if($stmt->execute()){
				return true;
			}
		}catch(PDOException $e){
			echo "Error insert record: <br>".$e->getMessage();
			return false;
		}
	}

	//Update record
	public function update(){
		$sql = "UPDATE $this->table
				SET topic_name = :new_name
				WHERE topic_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->topic_id);
		$stmt->bindParam(":new_name",$this->topic_name);

		try{
			if($stmt->execute()){
				return true;
			}
		}catch(PDOException $e){
			echo "Error update record: <br>".$e->getMessage();
			return false;
		}
	}

	//Delete record
	public function delete(){
		$sql = "DELETE FROM $this->table WHERE topic_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->topic_id);

		try{
			if($stmt->execute()){
				return true;
			}
		}catch(PDOException $e){
			echo "Error delete record: <br>".$e->getMessage();
			return false;
		}
	}
}
?>