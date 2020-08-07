<?php
     include_once '../lib/Database.php';
     include_once '../helpers/Format.php';
 
class Category 
{
	private $db;
	private $fb;
	public function __construct()
	{
		$this->db =new Database();
		$this->fm =new Format();
	}
	public function catInsert($catName){
	$catName=$this->fm->validation($catName);
	$catName=mysqli_real_escape_string($this->db->link, $catName);

	If(empty($catName)){
		$msg= "<span class='error'>Category must not be empty!</span>";
		return $msg;
	}
	else{
		$query="INSERT INTO tbl_category(catName) values('$catName')";
		$catinsert=$this->db->insert($query);
		if($catinsert){
			$msg = "<span class='success'>category inserted successfully.</span>";
			return $msg;
		}
		else{ 
			$msg="<span class='error'>category not inserted successfully.</span>";
            return $msg;
		}
	}
	}
}
?>