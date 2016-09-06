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

				header('Location: index.php');
			}else{
			return '<div class="message error-msg">Login failed, please try again.</div>';
			}
		}else{
			return '<div class="message error-msg">This email address does not exist. Please register your account first</div>';
		}
	}
}
?>