<?php
	class Todo{
		public $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function addTodo($date, $info){
			$query = "INSERT INTO todo(date, info) VALUES('".$this->db->real_escape_string($date)."','".$this->db->real_escape_string($info)."');";

			if($this->db->query($query) === TRUE){
				return "Todo item is added to the list";
			}else{
				return "Whoops, something went wrong...";
			}
		}

		public function getAll(){
			$query = $this->db->query('SELECT * FROM todo ORDER BY date');

			if($query->num_rows > 0){
				$todos = array();

				while($i = $query->fetch_assoc()){
					$todos[] = $i;
				}

				return $todos;
			}else{
				return 'Er zijn geen todo items';
			}
		}
	}
?>