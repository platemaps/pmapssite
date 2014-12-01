<?php
class ModelMapper extends Singleton{
	private $connection , $model;

	protected function __construct(){
		$this->connection = Connection::instance();
	}

	private function proptostring($includingpk){
		$set 	= array();
		$prop 	= $this->model->getProp();

		if(!$includingpk){
			if($this->model->isPkSet()){
				unset($prop[$this->model->primarykey()]);
			}
		}

		foreach($prop as $var => $val){
			$set[] = $var . "=:". $var;
		}

		return implode("," , $set);
	}

	private function proptovar($includingpk){
		$set = array();
		$prop = $this->model->getProp();
		if(!$includingpk){
			if($this->model->isPkSet()){
				unset($prop[$this->model->primarykey()]);
			}
		}

		foreach($prop as $var => $val){
			$set[":". $var] = $val;
		}

		return $set;
	}

	private function findPk($table){
		$sql 	= "SHOW KEYS FROM ". $table ." WHERE Key_name = 'PRIMARY'";
		$stmt 	= $this->connection->engine()->prepare($sql);
		$stmt->execute();
		$fetch 	= $stmt->fetch(PDO::FETCH_ASSOC);
		return $fetch['Column_name'];
	}

	public function insert($model , $includingpk = false){
		$this->model = $model;
		try{
			$sql = "INSERT INTO ". $model->table() . " SET " . $this->proptostring($includingpk);
			$stmt = $this->connection->engine()->prepare($sql);

			foreach($this->proptovar($includingpk) as $var => $val){
				$stmt->bindValue($var , $val);
			}

			return $stmt->execute();
		}catch(Exception $err){
			return false;
		}
	}

	public function update($model){
		$this->model = $model;
		try{
			$sql = "UPDATE ". $model->table() . " 
						SET " . $this->proptostring(false) . " 
						WHERE  ". $model->primarykey() ."= :". $model->primarykey();

			$bind = $this->proptovar(true);
			$bind[":". $model->primarykey()] = $model->{$model->primarykey()};

			$stmt = $this->connection->engine()->prepare($sql);
			foreach($bind as $var => $val){
				$stmt->bindValue($var , $val);
			}

			return $stmt->execute();
		}catch(Exception $err){
			
			return false;
		}
	}

	public function delete($model){
		$this->model = $model;
		try{
			if($model->primarykey() == null || $model->primarykey() == ""){
				throw new Exception("Primary Key not set");
			}
			$sql = "DELETE FROM ". $model->table() . " 
						WHERE ". $model->primarykey() . "=:" . $model->primarykey();

			$stmt = $this->connection->engine()->prepare($sql);
			$stmt->bindValue(":". $model->primarykey() , $model->{$model->primarykey()});
			return $stmt->execute();
		}catch(Exception $err){
			echo $err->getMessage();
			return false;
		}
	}

	public function findByID($model , $id){
		$modelobj = new $model;

		try{
			$sql = "SELECT * FROM ". $modelobj->table() . " 
							WHERE ". $modelobj->primarykey() ."=:". $modelobj->primarykey();
			$stmt = $this->connection->engine()->prepare($sql);
			$stmt->bindValue(":". $modelobj->primarykey() , $id);
			$stmt->execute();
			$fetch = $stmt->fetch(PDO::FETCH_ASSOC);

			foreach($fetch as $field => $value){
				$modelobj->{$field} = $value;
			}

			return $modelobj;
		}catch(Exception $err){
			echo $err->getMessage();
			return false;
		}
	}

	public function findAll($model){
		$modelobj = new $model;
		$bound = array();

		try{
			$sql = "SELECT * FROM ". $modelobj->table();
			$stmt = $this->connection->engine()->prepare($sql);

			$stmt->execute();
			
			while($fetch = $stmt->fetch(PDO::FETCH_ASSOC)){
				$newmodel = new $model;
				foreach($fetch as $field => $value){
					$newmodel->{$field} = $value;
				}
				$bound[] = $newmodel;
			}

			return $bound;
		}catch(Exception $err){
			echo $err->getMessage();
			return false;
		}
	}

	public function findLast($model){
		$modelobj = new $model;

		try{
			$sql = "SELECT * FROM ". $modelobj->table() ." ORDER BY ". $modelobj->primarykey() . " DESC LIMIT 1";
			$stmt = $this->connection->engine()->prepare($sql);
			$stmt->execute();
			$fetch = $stmt->fetch(PDO::FETCH_ASSOC);

			foreach($fetch as $field => $value){
				$modelobj->{$field} = $value;
			}

			return $modelobj;
		}catch(Exception $err){
			echo $err->getMessage();
			return false;
		}
	}

	public function findFirst($model){
		$modelobj = new $model;

		try{
			$sql = "SELECT * FROM ". $modelobj->table() ." ORDER BY ". $modelobj->primarykey() . " ASC LIMIT 1";
			$stmt = $this->connection->engine()->prepare($sql);
			$stmt->execute();
			$fetch = $stmt->fetch(PDO::FETCH_ASSOC);

			foreach($fetch as $field => $value){
				$modelobj->{$field} = $value;
			}

			return $modelobj;
		}catch(Exception $err){
			echo $err->getMessage();
			return false;
		}
	}
}
?>