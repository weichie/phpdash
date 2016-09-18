<?php
class User{
	protected $userID;
	protected $username;
	protected $email;
	public $db;

	public function __construct($db){
		$this->db=$db;
	}

	public function register($username, $email, $password){
		$options = ['cost' => 12];

		$password = password_hash($password, PASSWORD_DEFAULT, $options);
		$query = "INSERT INTO users(username, email, password) VALUES ('".$this->db->real_escape_string($username)."','".$this->db->real_escape_string($email)."','".$this->db->real_escape_string($password)."');";

		//bestaat gebruiker al?
		$controle = "SELECT * FROM users WHERE email='".$this->db->real_escape_string($email)."'";
		$qry = $this->db->query($controle);
		$result = $qry->fetch_assoc();

		if($qry->num_rows == 1){
			return '<div class="message error-msg">This email address is already in use...</div>';
		}else{
			if($this->db->query($query) === TRUE){
				return '<div class="message success-msg">Registration complete, you can now login to your account!</div>';
			}else{
				return '<div class="message error-msg">Error: ' . $query . '<br>' . $conn->error;
			}
		}
	}

	public function login($email, $password){
		$query = "SELECT * FROM users WHERE email = '".$this->db->real_escape_string($email)."'";
		$qry = $this->db->query($query);
		$result = $qry->fetch_assoc();

		if($qry->num_rows == 1){
			if(password_verify($password, $result['password'])){
				$_SESSION['logged'] = true;
				$_SESSION['user_id'] = $result['id'];
				header('Location: index.php');
			}else{
			return '<div class="message error-msg">Login failed, please try again.</div>';
			}
		}else{
			return '<div class="message error-msg">This email address does not exist. Please register your account first</div>';
		}
	}

	public function updateUser($name, $username, $email, $company){
		$query = "UPDATE users SET name='".$this->db->real_escape_string['$name']."', username='".$this->db->real_escape_string['$username']."', email='".$this->db->real_escape_string['$email']."', company='".$this->db->real_escape_string['$company']."' WHERE id='".$_SESSION['user_id']."';";
		$controle = "SELECT id FROM users WHERE id=".$_SESSION['user_id']."";

		$qry = $this->db->query($controle);
		$result = $qry->fetch_assoc();

		if($qry->num_rows == 1){
			if($this->db->query($query)){
				return "Account is geupdate";
			}else{
				return "Whoops, something went wrong...";
			}
		}
	}

	public function logout(){
		session_destroy();
		header('Location:'.SITE_URL);
		exit;
	}
}
?>