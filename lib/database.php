<?php 
	class Database{
		public $host   = DB_HOST;
		public $user   = DB_USER;
		public $pass   = DB_PASS;
		public $dbname = DB_NAME;

		public $link;
		public $error;

		public function __construct(){
			$this->connnectDB();
		}

		private function connnectDB() {
			$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			if (!$this->link) {
				$this->error ="Connection fail".$this->link->connect_error;
				return false;
			}
		}
		// select or read data
		public function select ($query) {
			$result = $this->link->query($query) or die ($this->link->error._LINE_);
			if($result->num_rows > 0) {
				return $result;
			} else {
				return false;
			}
		}
		// insert data
		public function insert($query){
			$insert_row = $this->link->query($query) or die ($this->link->error._LINE_);
			if($insert_row) {
				return $insert_row;
				exit();
			} else {
				return false;
			}
		}
		// update data
		public function update($query){
			$update_row = $this->link->query($query) or die ($this->link->error._LINE_);
			if($update_row) {
				return $update_row;
				exit();
			} else {
				return false;
			}
		}
		// delete data
		public function delete($query){
			$delete_row = $this->link->query($query) or die ($this->link->error._LINE_);
			if($delete_row) {
				return $delete_row;
				exit();
			} else {
				return false;
			}
		}
	}
?>