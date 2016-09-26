<?php
	class Uitgaven{
		public $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function newCost($date, $item, $description, $price){
			$query = "INSERT INTO uitgaven(date, item, description, price, user_id) VALUES ('".$this->db->real_escape_string($date)."','".$this->db->real_escape_string($item)."','".$this->db->real_escape_string($description)."','".$this->db->real_escape_string($price)."','".$_SESSION['user_id']."');";

			if($this->db->query($query) === TRUE){
				echo "Cost added correctly";
			}else{
				echo "Whoops, something went wrong";
			}
		}

		public function getAll(){
			$query = $this->db->query("SELECT * FROM uitgaven WHERE user_id='".$_SESSION['user_id']."' ORDER BY date");

			if($query->num_rows > 0){
				$uitgaven = array();

				while($i = $query->fetch_assoc()){
					$uitgaven[] = $i;
				}

				return $uitgaven;
			}else{
				echo 'Er zijn nog geen items toegevoegd..';
			}
		}

		public function getLastFive(){
			$query = $this->db->query('SELECT date, item, price FROM uitgaven WHERE user_id="'.$_SESSION['user_id'].'" ORDER BY date DESC LIMIT 5');

			if($query->num_rows > 0){
				$uitgaven = array();

				while($i = $query->fetch_assoc()){
					$uitgaven[] = $i;
				}

				return $uitgaven;
			}else{
				echo 'Er zijn geen recente inkomsten';
			}
		}

		public function getTotalExpenses(){
			$query = $this->db->query('SELECT SUM(price) as total FROM uitgaven WHERE user_id="'.$_SESSION['user_id'].'"');

			if($query->num_rows == 1){
				$expenses = $query->fetch_assoc();
				return $expenses['total'];
			}else{
				return '0';
			}
		}

		public function getLastFiveExpenses(){
			$query = $this->db->query('SELECT SUM(price) as total FROM (SELECT price FROM uitgaven  WHERE user_id="'.$_SESSION['user_id'].'" ORDER BY date DESC LIMIT 5) as lel');

			if($query->num_rows == 1){
				$expense = $query->fetch_assoc();
				return $expense['total'];
			}else{
				return '0';
			}
		}

	}
?>