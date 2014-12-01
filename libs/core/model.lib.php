<?php
class Model{
	protected $table = null;
	protected $primarykey = null;
	private $prop = array();

	public function __set($var , $val){ $this->prop[$var] = $val; }
	public function __get($var){ return $this->prop[$var]; }

	public function table(){
		if($this->table == null || $this->table == ""){
			throw new Exception("Table not defined");
		}

		return $this->table;
	}

	public function primarykey(){
		if(!$this->isPkSet()){
			throw new Exception("Primary Key not defined");
		}

		return $this->primarykey;
	}

	public function isPkSet(){
		return $this->primarykey == null || $this->primarykey == "" ? false : true;
	}

	public function getProp(){
		return $this->prop;
	}

	public function setPrimarykey($pk){
		$this->primarykey = $pk;
	}

	public static function find($primarykey_value){
		$classname = get_called_class();
		$mapper = ModelMapper::instance();
		switch($primarykey_value){
			case "all":
				return $mapper->findAll($classname);
			break;
			case "last":
				return $mapper->findLast($classname);
			break;
			case "first":
				return $mapper->findFirst($classname);
			break;
			default :
				return $mapper->findByID($classname , $primarykey_value);
		}
	}
}
?>