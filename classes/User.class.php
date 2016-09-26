<?php
class User{
	protected $userID;
	protected $username;
	protected $email;
	protected $company;
	protected $logo;
	public $db;

	public function __construct($db){
		$this->db=$db;
	}

	public function setCompany($company){
		$this->company = $company;
		$_SESSION['company'] = $company;
	}
	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}

	public function getCompany(){
		if(!empty($this->company)){
			return $this->company;
		}else if(isset($_SESSION['company'])){
			return $_SESSION['company'];
		}else{
			return "WeichieProjects";
		}
	}
	public function setLogo($logo){
		$this->logo = $logo;
		$_SESSION['logo'] = $logo;
	}
	public function getLogo(){
		if(!empty($this->logo)){
			return $this->logo;
		}else{
			return $_SESSION['logo'];
		}
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
			echo '<div class="message error-msg">This email address is already in use...</div>';
		}else{
			if($this->db->query($query) === TRUE){
				echo '<div class="message success-msg">Registration complete, you can now login to your account!</div>';
			}else{
				echo '<div class="message error-msg">Error: ' . $query . '<br>' . $conn->error;
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
				$_SESSION['company'] = $result['company'];

				$this->setName($result['name']);

				header('Location: index.php');
			}else{
				echo '<div class="message error-msg">Login failed, please try again.</div>';
			}
		}else{
			echo '<div class="message error-msg">This email address does not exist. Please register your account first</div>';
		}
	}

	public function updateUser($name, $username, $email, $company, $company_logo){
		$query = "UPDATE users SET name='".$this->db->real_escape_string($name)."', username='".$this->db->real_escape_string($username)."', email='".$this->db->real_escape_string($email)."', company='".$this->db->real_escape_string($company)."', company_logo='".$this->db->real_escape_string($logo['name'])."' WHERE id='".$_SESSION['user_id']."';";
		$controle = "SELECT id FROM users WHERE id=".$_SESSION['user_id']."";

		$qry = $this->db->query($controle);
		$result = $qry->fetch_assoc();

		if($qry->num_rows == 1){
			if($this->db->query($query)){
				echo "Account is geupdate";
				$this->setCompany($result['company']);
			}else{
				echo "Whoops, something went wrong...";
			}
		}
	}

	public function upload_logo($file){
		if(!empty($file['name'])){
			$file_name = $file['name'];
			$temp_name = $file['tmp_name'];
			$imgtype = $file['type'];
			$ext = $this->getImageExtention($imgtype);
			$target_path = "uploads/logo/".$file_name;

			if(move_uploaded_file($temp_name, $target_path)){
				$query = 'UPDATE users SET company_logo="'.$this->db->real_escape_string($file['name']).'" WHERE id="'.$_SESSION['user_id'].'"';

				if($this->db->query($query)){
					echo "Company logo updated!";
				}else{
					echo "Whoops, something went wrong... Please try again!";
				}
			}
		}
	}

	public function getImageExtention($imagetype){
		if(empty($imagetype)){
			return false;
		}else{
			switch($imagetype){
				case 'image/bmp': return '.bmp';
				case 'image/gif': return '.gif';
				case 'iamge/jpeg': return '.jpg';
				case 'image/png': return '.png';
				default: return false;
			}
		}
	}

	public function isLogged(){
		if($_SESSION['logged'] === TRUE){
			$query = "SELECT * FROM users WHERE id='".$_SESSION['user_id']."';";
			$controle = "SELECT id FROM users WHERE id='".$_SESSION['user_id']."';";

			$qry = $this->db->query($controle);
			$result = $qry->fetch_assoc();

			if($qru->num_rows == 1){
				$this->setName($result['name']);
				$this->setCompany($result['company']);
			}
			// get all info from database
		}else{
			
		}
	}

	public function logout(){
		session_destroy();
		header('Location:'.SITE_URL);
		exit;
	}
}
?>