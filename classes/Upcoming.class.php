<?php
	class Upcoming{
		public $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function newUpcoming($date, $info, $budget){
			$query = "INSERT INTO upcoming(date, info, budget, user_id) VALUES ('".$this->db->real_escape_string($date)."','".$this->db->real_escape_string($info)."','".$this->db->real_escape_string($budget)."','".$_SESSION['user_id']."');";

			if($this->db->query($query) === TRUE){
				echo "Project saved";
			}else{
				echo "Whoops, something went wrong...";
			}
		}

		public function getAll(){
			$query = $this->db->query('SELECT * FROM upcoming WHERE user_id="'.$_SESSION['user_id'].'" ORDER BY date');

			if($query->num_rows > 0){
				$projecten = array();

				while($i = $query->fetch_assoc()){
					$projecten[] = $i;
				}

				return $projecten;
			}else{
				echo 'Er zijn geen recente projecten';
			}
		}

		public function deleteProject(){
			$query = "DELETE FROM upcoming WHERE id='".$this->db->real_escape_string($_GET['id'])."'";

			if($this->db->query($query) === TRUE){
				echo "Project verwijderd";
			}else{
				echo "Whooops, something went wrong...";
			}
		}
	}
?>