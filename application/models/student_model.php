<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model {

	//Student attributes
	
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

	/*Student Functions*/
	
	public function addStudent()
	{
	//Add student to DB
		$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'midName' => $this->input->post('midName')
			);
		
		$this->db->insert("students", $data);
	}
	
	public function editStudent($userId)
	{
	//Update student data in DB
		$data = array(
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'midName' => $this->input->post('midName')
		);

		$this->db->where('idstudents', $userId);
		$this->db->update('students', $data); 	
	}
	
	public function validateId()
	{
	//Retrieves an ID from a form and ensures ID exists in DB
		$userId=$this->input->post('idstudent');
		
		$query=$this->db->get_where('students',array('idstudents'=>$userId)); 
		
		if($query->num_rows() > 0)
		{
			return $userId;
		}
		else
		{
			echo "ID does not exist.";
			return null;
		}
	}

	public function isEnrolled($userId)
	{
	//Check if given student is enrolled in given class
		$classId=$this->input->post('idclass');
		
		//Query checks for row with student ID and class ID
		$query = $query = $this->db->get_where('junctiontable', array('idstudents' => $userId, 'idclasses' => $classId));
		
		if ($query->num_rows() > 0) 
		{
			return true;
		}
		return false;
	}
	
	public function enroll($userId)
	{
	//Enroll a given student in a given course
	//Returns false if Class ID is invalid
		$classId=$this->input->post('idclass');
		//Check if course is real
		if($this->class_model->validateId($classId))
		{
			$this->db->insert("junctionTable", array(
				'idclasses' =>$classId,
				'idstudents' => $userId
				)
			);			

			return true;	
		}
		return false;
	}

	public function unenroll($userId, $classId=null)
	{
		//If no classId provided, look for it in form data
		if($classId==null){
			$classId=$this->input->post('idclass');
		}

		$this->db->delete('junctiontable', array(
		'idclasses' => $classId, 
		'idstudents' => $userId)
		); 

	}
	
	public function deleteStudent($userId)
	{
		$this->db->delete('students', array('idstudents' => $userId)); 
	}

	public function totalNumOfStudents()
	{
		return $this->db->count_all("students");
	}
	
	public function paginationList($limit, $start)
	{		
	//Returns an array of students limited for pagination
        $this->db->limit($limit, $start);
        $query = $this->db->get("students");
 
        if ($query->num_rows() > 0) 
		{
            foreach ($query->result() as $row) 
			{
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	
	public function getStudentClassList($userId)
	{
		$data = array();
		
		//$query = $query = $this->db->get_where('junctiontable', array('idstudents' => $userId));
		
		//Get classes info using junction table and inner join
		$this->db->select('classes.idclasses, classes.title');
		$this->db->from('junctiontable');
		$this->db->join('classes', 'junctiontable.idclasses = classes.idclasses','inner');
		$this->db->where('junctiontable.idstudents', $userId); 
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) 
		{
            foreach ($query->result() as $row) 
			{
                $data[] = $row;
            }
            return $data;
        }
	}
	
	public function getStudentInfo($userId)
	{
		$data = array();
		
			$query = $this->db->get_where("students", array("idstudents" => $userId));
			
			if ($query->num_rows() > 0) 
			{
				$data[] = $query->row();
			}
			else
				{echo "No student found";}
			
		return $data;

	}
	
}

