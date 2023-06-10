<?php  
class blog_post{

	//DB params
	private $table = "blog_posts";
	private $conn;

	//Myguests properties
	public $blog_post_id;
	public $blog_post_id_random;
	public $blog_image_topic;
	public $blog_image_topic_random;
	public $blog_topic;
	public $blog_content;
	public $blog_avatar_topic;
	public $blog_avatar_topic_random;
	public $blog_recomment;
	public $blog_name_owner;
	public $blog_date;

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
		$sql = "SELECT * FROM $this->table WHERE blog_post_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->blog_post_id);
		$stmt->execute();
		$row = $stmt->fetch();
		$this->blog_post_id = $row['blog_post_id'];
		$this->blog_post_id_random = $row['blog_post_id_random'];
		$this->blog_image_topic = $row['blog_image_topic'];
		$this->blog_image_topic_random = $row['blog_image_topic_random'];
		$this->blog_topic = $row['blog_topic'];
		$this->blog_content = $row['blog_content'];
		$this->blog_avatar_topic = $row['blog_avatar_topic'];
		$this->blog_avatar_topic_random = $row['blog_avatar_topic_random'];
		$this->blog_recomment = $row['blog_recomment'];
		$this->blog_name_owner = $row['blog_name_owner'];
		$this->blog_date = $row['blog_date'];		
	}

	//Add record
	public function add(){
		$sql = "INSERT INTO $this->table SET blog_post_id_random = :new_blog_post_id_random,
											blog_image_topic = :new_image_topic,
											blog_topic = :new_topic,
											blog_image_topic_random = :new_image_topic_random,
											blog_content = :new_content,
											blog_avatar_topic = :new_blog_avatar_topic,
											blog_avatar_topic_random = :new_blog_avatar_topic_random,
											blog_recomment = :new_recomment,
											blog_name_owner = :new_name_owner";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":new_blog_post_id_random",$this->blog_post_id_random);
		$stmt->bindParam(":new_image_topic",$this->blog_image_topic);
		$stmt->bindParam(":new_image_topic_random",$this->blog_image_topic_random);
		$stmt->bindParam(":new_topic",$this->blog_topic);
		$stmt->bindParam(":new_content",$this->blog_content);
		$stmt->bindParam(":new_blog_avatar_topic",$this->blog_avatar_topic);
		$stmt->bindParam(":new_blog_avatar_topic_random",$this->blog_avatar_topic_random);
		$stmt->bindParam(":new_recomment",$this->blog_recomment);
		$stmt->bindParam(":new_name_owner",$this->blog_name_owner);

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
				SET blog_image_topic = :new_image_topic,
					blog_topic = :new_topic,
					blog_image_topic_random = :new_image_topic_random,
					blog_content = :new_content,
					blog_avatar_topic = :new_blog_avatar_topic,
					blog_avatar_topic_random = :new_blog_avatar_topic_random,
					blog_recomment = :new_recomment,
					blog_name_owner = :new_name_owner
				WHERE blog_post_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->blog_post_id);
		$stmt->bindParam(":new_image_topic",$this->blog_image_topic);
		$stmt->bindParam(":new_image_topic_random",$this->blog_image_topic_random);
		$stmt->bindParam(":new_topic",$this->blog_topic);
		$stmt->bindParam(":new_content",$this->blog_content);
		$stmt->bindParam(":new_blog_avatar_topic",$this->blog_avatar_topic);
		$stmt->bindParam(":new_blog_avatar_topic_random",$this->blog_avatar_topic_random);
		$stmt->bindParam(":new_recomment",$this->blog_recomment);
		$stmt->bindParam(":new_name_owner",$this->blog_name_owner);

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
		$sql = "DELETE FROM $this->table WHERE blog_post_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->blog_post_id);

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