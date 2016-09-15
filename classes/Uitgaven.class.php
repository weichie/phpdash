<?php
	class Uitgaven{
		public $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function newCost($date, $item, $description, $price){
			$query = "INSERT INTO uitgaven(date, item, description, price) VALUES ('".$this->db->real_escape_string($date)."','".$this->db->real_escape_string($item)."','".$this->db->real_escape_string($description)."','".$this->db->real_escape_string($price)."');";

			if($this->db->query($query) === TRUE){
				return "Cost added correctly";
			}else{
				return "Whoops, something went wrong";
			}
		}

		public function getAll(){
			$query = $this->db->query("SELECT * FROM uitgaven ORDER BY date");

			if($query->num_rows > 0){
				$uitgaven = array();

				while($i = $query->fetch_assoc()){
					$uitgaven[] = $i;
				}

				return $uitgaven;
			}else{
				return 'Er zijn nog geen items toegevoegd..';
			}
		}

		public function getLastFive(){
			$query = $this->db->query('SELECT date, item, price FROM uitgaven ORDER BY date DESC LIMIT 5');

			if($query->num_rows > 0){
				$uitgaven = array();

				while($i = $query->fetch_assoc()){
					$uitgaven[] = $i;
				}

				return $uitgaven;
			}else{
				return 'Er zijn geen recente inkomsten';
			}
		}

		public function getTotalExpenses(){
			$query = $this->db->query("SELECT SUM(price) as total FROM uitgaven");

			if($query->num_rows == 1){
				$expenses = $query->fetch_assoc();
				return $expenses['total'];
			}else{
				return '0';
			}
		}

	}
?>