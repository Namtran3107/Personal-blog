<?php  
class user{

	//DB params
	private $table = "admin_user";
	private $conn;

	//Myguests properties
	public $user_id ;
	public $user_password;
	public $user_name;
	public $user_phone;
	public $user_image;
	public $user_email;

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
	public function read(){
		$sql = "SELECT * FROM $this->table WHERE user_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->user_id);
		$stmt->execute();
		$row = $stmt->fetch();
		$this->user_id = $row['user_id'];
		$this->user_email = $row['user_email'];
		$this->user_name = $row['user_name'];
		$this->user_password = $row['user_password'];
		$this->user_phone = $row['user_phone'];
		$this->user_image = $row['user_image'];
	}

	//LOGIN
	public function login(){
		$sql = "SELECT * FROM $this->table WHERE user_email = :get_email AND user_password = :get_password";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_email",$this->user_email);
		$stmt->bindParam(":get_password",$this->user_password);
		$stmt->execute();
		return $stmt;
	}

	//Add record
	public function add(){
		$sql = "INSERT INTO $this->table SET user_name = :new_user_name,
											user_password = :new_user_password,
											user_email = :new_user_email,
											user_image = :new_user_image";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":new_user_name",$this->user_name);
		$stmt->bindParam(":new_user_password",$this->user_password);
		$stmt->bindParam(":new_user_email",$this->user_email);
		$stmt->bindParam(":new_user_image",$this->user_image);
		try{
			if($stmt->execute()){
				return true;
			}
		}catch(PDOException $e){
			echo "Error insert record: <br>".$e->getMessage();
			return false;
		}
	}
	public function add_register(){
		$sql = "INSERT INTO $this->table SET user_name = :new_user_name,
											user_password = :new_user_password,
											user_email = :new_user_email";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":new_user_name",$this->user_name);
		$stmt->bindParam(":new_user_password",$this->user_password);
		$stmt->bindParam(":new_user_email",$this->user_email);
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
		$sql = "UPDATE $this->table SET user_name = :new_user_name,
										user_password = :new_user_password,
										user_phone = :new_user_phone,
										user_image = :new_image,
										user_email = :new_user_email
										WHERE user_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":new_user_name",$this->user_name);
		$stmt->bindParam(":new_user_password",$this->user_password);
		$stmt->bindParam(":new_user_phone",$this->user_phone);
		$stmt->bindParam(":new_image",$this->user_image);
		$stmt->bindParam(":new_user_email",$this->user_email);
		$stmt->bindParam(":get_id",$this->user_id);

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
		$sql = "DELETE FROM $this->table WHERE user_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->user_id);

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