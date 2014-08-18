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
	
	public function addStudent(){
	//make a data array of all student attributes
	$data = array(
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'midName' => $this->input->post('midName')

		);
		
		$this->db->insert("students", $data);
	}
	
	public function editStudent($userId){
		$data = array(
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'midName' => $this->input->post('midName')
		);

		$this->db->where('idstudents', $userId);
		$this->db->update('students', $data); 	
	}
	
	public function validateId(){
		$userId=$this->input->post('idstudent');
		$query=$this->db->get_where('students',array('idstudents'=>$userId)); 
		if($query->num_rows() > 0){
			return $userId;
		}else{
			echo "ID does not exist.";
			return null;
		}
	}
	
	public function numOfClasses($userId){
	   $query=$this->db->get_where('students',array('idstudents'=>$userId)); 
	   $count=0;
    		if ($query->num_rows() > 0) {
    			//Loop through each row returned from the query
    			foreach ($query->result() as $row) {
					if($row->class1){$count++;}
					if($row->class2){$count++;}
					if($row->class3){$count++;}
					if($row->class4){$count++;}
				}
			}
		return $count;
	}
	
	public function isEnrolled($userId){
		$classId=$this->input->post('idclass');
		echo $classId;
		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('idstudents', $userId);
		$this->db->where('class1', $classId);
		$this->db->or_where('class2', $classId);
		$this->db->or_where('class3', $classId);
		$this->db->or_where('class4', $classId);
		$query=$this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}
	
	public function enroll($userId){
		$classId=$this->input->post('idclass');
		   $query=$this->db->get_where('students',array('idstudents'=>$userId)); 
			if ($query->num_rows() > 0) {
				//Loop through each row returned from the query
				foreach ($query->result() as $row) {
					if(!$row->class1){
						$data = array('class1' => $classId);
						$this->db->where('idstudents', $userId);
						$this->db->update('students', $data);		
					}
					elseif(!$row->class2){
						$data = array('class2' => $classId);
						$this->db->where('idstudents', $userId);
						$this->db->update('students', $data);		
					}
					elseif(!$row->class3){
						$data = array('class3' => $classId);
						$this->db->where('idstudents', $userId);
						$this->db->update('students', $data);		
					}
					else{
						$data = array('class4' => $classId);
						$this->db->where('idstudents', $userId);
						$this->db->update('students', $data);		
					}
				}
			}			
	}

	public function unenroll($userId, $classId=0){
		if($classId==0){
			$classId=$this->input->post('idclass');
		}
		   $query=$this->db->get_where('students',array('idstudents'=>$userId)); 
			if ($query->num_rows() > 0) {
				//Loop through each row returned from the query
				foreach ($query->result() as $row) {
					if($row->class1==$classId){
						$data = array('class1' => null);
						$this->db->where('idstudents', $userId);
						$this->db->update('students', $data);		
					}
					elseif($row->class2==$classId){
						$data = array('class2' => null);
						$this->db->where('idstudents', $userId);
						$this->db->update('students', $data);		
					}
					elseif($row->class3==$classId){
						$data = array('class3' => null);
						$this->db->where('idstudents', $userId);
						$this->db->update('students', $data);		
					}
					elseif($row->class4==$classId){
						$data = array('class4' => null);
						$this->db->where('idstudents', $userId);
						$this->db->update('students', $data);		
					}
				}
			}
	}
	
	public function deleteStudent($userId){
		$this->db->delete('students', array('idstudents' => $userId)); 
	}

	public function totalNumOfStudents(){
		return $this->db->count_all("students");
	}
	
	public function paginationList($limit, $start){		
        $this->db->limit($limit, $start);
        $query = $this->db->get("students");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   
	}
	
	public function getStudent($userId = 0, $classId=0){
		$data = array();
		if($userId>0){
			$query = $this->db->get_where("students", array("idstudents" => $userId));
			if ($query->num_rows() > 0) {
				$data[] = $query->row();
			}
			else{echo "no student found";}
		}
		else{
			$query = $this->db->select("*")->from("students")->get();
			if ($query->num_rows() > 0) {
				//Loop through each row returned from the query
				foreach ($query->result() as $row) {
					if($byClassId==0){
						$data[] = $row;
					}
					else{
						if($row->class1==$byClassId | $row->class2==$byClassId | $row->class3==$byClassId | $row->class4==$byClassId){
							$data[] = $row;
						}
					}
				}
			}
		}
		return $data;

	}
	
}

