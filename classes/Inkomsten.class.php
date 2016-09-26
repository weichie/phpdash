<?php
	class Inkomsten{
		public $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function newInvoice($date, $company, $project, $price){
			$query = "INSERT INTO inkomsten(date, company, project, price, user_id) VALUES ('".$this->db->real_escape_string($date)."','".$this->db->real_escape_string($company)."','".$this->db->real_escape_string($project)."','".$this->db->real_escape_string($price)."','".$_SESSION['user_id']."');";

			if($this->db->query($query) === TRUE){
				echo "Invoice added correctly";
			}else{
				echo "Whoops, something went wrong..";
			}
		}

		public function getAll(){
			$query = $this->db->query('SELECT * FROM inkomsten WHERE user_id="'.$_SESSION['user_id'].'" ORDER BY date');

			if($query->num_rows > 0){
				$inkomsten = array();

				while($i = $query->fetch_assoc()){
					$inkomsten[] = $i;
				}

				return $inkomsten;
			}else{
				echo 'Er zijn nog geen inkomsten..';
			}
		}

		public function getLastFive(){
			$query = $this->db->query('SELECT date, company, price FROM inkomsten WHERE user_id="'.$_SESSION['user_id'].'" ORDER BY date DESC LIMIT 5');

			if($query->num_rows > 0){
				$inkomsten = array();

				while($i = $query->fetch_assoc()){
					$inkomsten[] = $i;
				}

				return $inkomsten;
			}else{
				echo 'Er zijn geen recente inkomsten';
			}
		}

		public function getTotalIncome(){
			$query = $this->db->query('SELECT SUM(price) as total FROM inkomsten WHERE user_id="'.$_SESSION['user_id'].'"');

			if($query->num_rows == 1){
				$income = $query->fetch_assoc();
				return $income['total'];
			}else{
				return '0';
			}
		}

		public function getLastFiveIncome(){
			$query = $this->db->query('SELECT SUM(price) as total FROM (SELECT price FROM inkomsten WHERE user_id="'.$_SESSION['user_id'].'" ORDER BY id DESC LIMIT 5) as lol');

			if($query->num_rows == 1){
				$income = $query->fetch_assoc();
				return $income['total'];
			}else{
				return '0';
			}
		}
	}
?>