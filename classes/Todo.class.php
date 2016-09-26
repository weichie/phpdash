<?php
	class Todo{
		public $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function addTodo($date, $info){
			$query = "INSERT INTO todo(date, info, user_id) VALUES('".$this->db->real_escape_string($date)."','".$this->db->real_escape_string($info)."','".$_SESSION['user_id']."');";

			if($this->db->query($query) === TRUE){
				echo "Todo item is added to the list";
			}else{
				echo "Whoops, something went wrong...";
			}
		}

		public function getAll(){
			$query = $this->db->query('SELECT * FROM todo WHERE user_id="'.$_SESSION['user_id'].'" ORDER BY date');

			if($query->num_rows > 0){
				$todos = array();

				while($i = $query->fetch_assoc()){
					$todos[] = $i;
				}

				return $todos;
			}else{
				echo 'Er zijn geen todo items';
			}
		}

		public function deleteTodo(){
			$query = "DELETE FROM todo WHERE id='".$this->db->real_escape_string($_GET['id'])."'";

			if($this->db->query($query) === TRUE){
				echo "todo item deleted";
			}else{
				echo "Whooops, something went wrong...";
			}
		}
	}
?>