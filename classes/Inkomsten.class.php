<?php
	class Inkomsten{
		public $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function newInvoice($date, $company, $project, $price){
			$query = "INSERT INTO inkomsten(date, company, project, price) VALUES ('".$this->db->real_escape_string($date)."','".$this->db->real_escape_string($company)."','".$this->db->real_escape_string($project)."','".$this->db->real_escape_string($price)."');";

			if($this->db->query($query) === TRUE){
				return "Invoice added correctly";
			}else{
				return "Whoops, something went wrong..";
			}
		}

		public function getAll(){
			$query = $this->db->query('SELECT * FROM inkomsten ORDER BY date');

			if($query->num_rows > 0){
				$inkomsten = array();

				while($i = $query->fetch_assoc()){
					$inkomsten[] = $i;
				}

				return $inkomsten;
			}else{
				return 'Er zijn nog geen inkomsten..';
			}
		}

		public function getLastFive(){
			$query = $this->db->query('SELECT date, company, price FROM inkomsten ORDER BY date DESC LIMIT 5');

			if($query->num_rows > 0){
				$inkomsten = array();

				while($i = $query->fetch_assoc()){
					$inkomsten[] = $i;
				}

				return $inkomsten;
			}else{
				return 'Er zijn geen recente inkomsten';
			}
		}

		public function getTotalIncome(){
			$query = $this->db->query('SELECT SUM(price) as total FROM inkomsten');

			if($query->num_rows == 1){
				$income = $query->fetch_assoc();
				return $income['total'];
			}else{
				return '0';
			}
		}

		public function getLastFiveIncome(){
			$query = $this->db->query('SELECT SUM(price) as total FROM INKOMSTEN ORDER BY id DESC LIMIT 5');

			if($query->num_rows == 1){
				$income = $query->fetch_assoc();
				return $income['total'];
			}else{
				return '0';
			}
		}
	}
?>