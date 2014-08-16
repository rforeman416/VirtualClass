<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model {

	/*
	Student attributes
	*/
	private $_idstudents;
	private $_firstName;
	private $_lastName;
	private $_midName;
	private $_class1;
	private $_class2;
	private $_class3;
	private $_class4;
	
	public function __construct(){
		parent::__construct();
	}

	/*
	Get's & Set's
	*/
	
	public function getID(){
		return $this->_idstudents;
	}
	
	public function setID($val){
		$this->_idstudents = $val;
	}
	
	public function getFirstName(){
		return $this->_firstName;
	}
	public function setFirstName($val){
		$this->_firstName = $val;
	}
	
	public function getLastName(){
		return $this->_lastName;
	}
	public function setLastName($val){
		$this->_lastName = $val;
	}

	public function getMidName(){
		return $this->_midName;
	}
	public function setMidName($val){
		$this->_midName = $val;
	}

	public function getClass1(){
		return $this->_class1;
	}
	public function setClass1($val){
		$this->_class1 = $val;
	}

	public function getClass2(){
		return $this->_class2;
	}
	public function setClass2($val){
		$this->_class2 = $val;
	}	

	public function getClass3(){
		return $this->_class3;
	}
	public function setClass3($val){
		$this->_class3 = $val;
	}	

	public function getClass4(){
		return $this->_class4;
	}
	public function setClass4($val){
		$this->_class4 = $val;
	}		
	
	/*
	Student Functions
	*/
	public function studentInfoArray(){
	
	
	}
	
	public function addStudent(){
	//make a data array of all student attributes
	$data = array(
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'midName' => $this->input->post('midName')

		);
		if ($this->db->insert("students", $data)) {
				//Now we can get the ID and update the newly created object
				//$this->_idstudents = $this->db->insert_idstudents();
				return true;
			}
		return false;
	
	}
	
	public function editStudent($userId){
		$data = array(
			//'idstudents' => $userId,
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'midName' => $this->input->post('midName')
		);
		/*
		if ($this->db->update("students", $data, $userId)) {
				return true;
		}
		return false;
		*/
		$this->db->where('idstudents', $userId);
		$this->db->update('students', $data); 
		echo $userId;

		//comments
	}
	
	public function validateId(){
	$userId=$this->input->post('idstudent');
	$query=$this->db->get_where('students',array('idstudents'=>$userId)); //check if 'id' field is existed or not
   if($query->num_rows() > 0)  // id found stop
   {echo "id exists";
	}
	else{
		echo "Id does not exist";
	}
	}
	
	public function deleteStudent(){
	$this->db->delete('students', array('idstudents' => $this->_idstudents)); 
	}


}