<?php
require_once 'KLogger.php';

class Dao {

  private $host = 'us-cdbr-iron-east-01.cleardb.net';
  private $dbname = 'heroku_1af02a616babf0a';
  private $username = 'b054a24ad67992';
  private $password = '41626217';
  private $logger;


 public function __construct() {
    $this->logger = new KLogger("log.txt", KLogger::DEBUG);
  }

 
  public function getConnection() {
    $this->logger->LogDebug("Getting a connection.");
	try {
       $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};", 
							"$this->username", "$this->password");
    } 
	catch (Exception $e) {
      $this->logger->LogError(__CLASS__ . "::" . __FUNCTION__ . " The database exploded " . print_r($e,1));
      echo print_r($e,1);
      exit;
    }
    return $connection;
  }
  /**
	 * Returns the database connection status string.
	 */
	public function getConnectionStatus()
	{
		$connection = $this->getConnection();
		return $connection->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
	}
/**
	 * Select users.
	 */
	public function getUsers(){
		$connection = $this->getConnection();
		$stmt = $connection->query("SELECT * FROM user");
		return $stmt->fetchAll();
	}


	/**
	 * Select user by email name.
	 */
	public function getUserByEmail($email){
		$this->logger->LogWarn("getting UserByEmail [{$email}]");
		$connection = $this->getConnection();
		$query = "SELECT email, name FROM user WHERE email = :email";
		$stmt = $connection->prepare($query);
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	
	public function userExists($email)
	{
		$conn = $this->getConnection();
		//prepared statements are safer, used to prevent injection attacks
		$stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		if($stmt->fetch()){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * Add user with first_name, last_name, email, password, username, latitude, longitude.
	 */
	public function addUser($fname, $lname, $email, $password, $username, $latitude, $longitude){
		$this->logger->LogInfo("addUser [{$email}]");
		//Password hashing for safety
		$digest = password_hash($password, PASSWORD_DEFAULT);
		if(!$digest){
			throw new Exception("Password could not be hashed");
		}
		
		$connection = $this->getConnection();

		$query = "INSERT INTO user (first_name, last_name, email, password, username, latitude, longitude)
								values(:fname, :lname, :email, :password, :username, :latitude, :longitude)";
		$stmt = $connection->prepare($query);
		$stmt->bindParam(':fname', $fname);
		$stmt->bindParam(':lname', $lname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $digest);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':latitude', $latitude);
		$stmt->bindParam(':longitude', $longitude);

		try{
			$stmt->execute();
			return true;
		}catch(PDOException $e){
			echo($e->getMessage());
			return false;
		}
	}

	public function validateUser($username, $password){

		$connection = $this->getConnection();
		$stmt = $connection->prepare("SELECT id, password, username FROM user 
								WHERE username = :username");
		$stmt->bindParam(':username', $username);
		//$stmt->bindParam(':password', $password);
		$stmt->execute();

		if(($user = $stmt->fetch())) {
			$digest = $user['password'];
			if(password_verify($password, $digest)) {
				return array('username' => $user['username'], 'user_id' => $user['id']);
			}			
		}
		return false;
	}

		//start of siting info
	public function saveSiting($date, $sex, $conditions, $comment, $user_id){
	//	$this->logger->LogInfo("savingSiting [{$date, $sex, $conditions, $comment, $user_id}]");
		$connection = $this->getConnection();
		$query = "INSERT INTO siting (date, sex, conditions, comment, user_id) VALUES (:date, :sex, :conditions, :comment, :user_id)";
		$stmt = $connection->prepare($query);
		$stmt->bindParam(':date', $date);
		$stmt->bindParam(':sex', $sex);
		$stmt->bindParam(':conditions', $conditions);
		$stmt->bindParam(':comment', $comment);
		$stmt->bindParam(':user_id', $user_id);
		return $stmt->execute();
	}
	
	
	public function getSitings ($data) {
		$connection = $this->getConnection();
		$query = $connection->prepare("SELECT * from siting where user_id = :data");
		$query->bindParam(":data",$data);
		$query->execute();
		$siting= $query->setFetchMode(PDO::FETCH_ASSOC);
		$siting= $query->fetchAll();
		return $siting;
	}
	
	//start of site info
	public function saveSite($feeder_description, $environment_description, $site_name, $comment, $latitude, $longitude, $user_id){
	//	$this->logger->LogInfo("savingSite [{$feeder_description, $environment_description, $site_name, $comment, $latitude, $longitude, $user_id}]");
		$connection = $this->getConnection();
		$query = "INSERT INTO site (feeder_description, environment_description, site_name, comment, latitude, longitude, user_id) VALUES (:feeder_description, :environment_description, :site_name, :comment, :latitude, :longitude :user_id)";
		$stmt = $connection->prepare($query);
		$stmt->bindParam(':feeder_description', $feeder_description);
		$stmt->bindParam(':environment_description', $environment_description);
		$stmt->bindParam(':site_name', $site_name);
		$stmt->bindParam(':comment', $comment);
		$stmt->bindParam(':latitude', $latitude);
		$stmt->bindParam(':longitude', $longitude);
		$stmt->bindParam(':user_id', $user_id);
		return $stmt->execute();
	//	try{
	//		$stmt->execute();
	//		return true;
	//	}catch(PDOException $e){
	//		echo($e->getMessage());
	//		return false;
	//	}
	}
	
	

	public function getSites(){
		$connection = $this->getConnection();
		$stmt = $connection->query("SELECT * FROM site");
		return $stmt->fetchAll();
	}
}
  ?>