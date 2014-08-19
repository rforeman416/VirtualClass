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
	
	public function numOfClasses($userId)
	{
	//Returns total number of classes given student has
	   $query=$this->db->get_where('students',array('idstudents'=>$userId)); 
	   $count=0;
    		if ($query->num_rows() > 0) 
			{
    			//Loop through each row returned from the query
    			foreach ($query->result() as $row) 
				{
					if($row->class1){$count++;}
					if($row->class2){$count++;}
					if($row->class3){$count++;}
					if($row->class4){$count++;}
				}
			}
		return $count;
	}
	
	public function isEnrolled($userId)
	{
	//Check if given student is enrolled in given class
		$classId=$this->input->post('idclass');
		
		//Query checks for row with student ID and class ID
		$query = $this->db->query('SELECT * FROM students WHERE idstudents = '.$userId.' AND (class1 = '.$classId.' OR class2 = '.$classId.' OR class3 = '.$classId.' OR class4 = '.$classId.')');
		
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
		   $query=$this->db->get_where('students',array('idstudents'=>$userId)); 
		   
			if ($query->num_rows() > 0) 
			{
				//Add class ID to an empty class slot
				foreach ($query->result() as $row) 
				{
					if(!$row->class1)
					{
						$data = array('class1' => $classId);
						$this->db->where('idstudents', $userId);
						$this->db->update('students', $data);		
					}
					elseif(!$row->class2)
					{
						$data = array('class2' => $classId);
						$this->db->where('idstudents', $userId);
						$this->db->update('students', $data);		
					}
					elseif(!$row->class3)
					{
						$data = array('class3' => $classId);
						$this->db->where('idstudents', $userId);
						$this->db->update('students', $data);		
					}
					else
					{
						$data = array('class4' => $classId);
						$this->db->where('idstudents', $userId);
						$this->db->update('students', $data);		
					}
				}
			}
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
		
	   $query=$this->db->get_where('students',array('idstudents'=>$userId)); 
		if ($query->num_rows() > 0) {
			//Remove class ID from whichever class slot it's found in (set it as null in DB)
			foreach ($query->result() as $row) 
			{
				if($row->class1==$classId)
				{
					$data = array('class1' => null);
					$this->db->where('idstudents', $userId);
					$this->db->update('students', $data);		
				}
				elseif($row->class2==$classId)
				{
					$data = array('class2' => null);
					$this->db->where('idstudents', $userId);
					$this->db->update('students', $data);		
				}
				elseif($row->class3==$classId)
				{
					$data = array('class3' => null);
					$this->db->where('idstudents', $userId);
					$this->db->update('students', $data);		
				}
				elseif($row->class4==$classId)
				{
					$data = array('class4' => null);
					$this->db->where('idstudents', $userId);
					$this->db->update('students', $data);		
				}
			}
		}
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
	
	public function getStudent($userId = null, $byClassId=null)
	{
		$data = array();
		
		//If userId provided, retrieve that specific student
		if($userId!=null)
		{
			$query = $this->db->get_where("students", array("idstudents" => $userId));
			
			if ($query->num_rows() > 0) 
			{
				$data[] = $query->row();
			}
			else
				{echo "No student found";}
		}
		//Else, if no userId provided, return multiple students
		else{
			$query = $this->db->select("*")->from("students")->get();
			
			if ($query->num_rows() > 0) 
			{
				//Loop through each row returned from the query
				foreach ($query->result() as $row) 
				{
					//If no class ID provided, return all students
					if($byClassId==null){
						$data[] = $row;
					}
					//If class ID provided, only return students enrolled in that class
					else
					{
						if($row->class1==$byClassId | $row->class2==$byClassId | $row->class3==$byClassId | $row->class4==$byClassId)
						{
							$data[] = $row;
						}
					}
				}
			}
		}
		return $data;

	}
	
}

