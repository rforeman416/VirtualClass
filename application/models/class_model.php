<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_model extends CI_Model {

	/*Class attributes*/
	
	private $_idclasses;
	private $_title;
	private $_teacher;
	private $_room;
	
	public function __construct(){
		parent::__construct();
	}

	/*Class Functions*/
	
	public function addClass()
	{
	//Add class to DB
		$data = array(
			'title' => $this->input->post('title'),
			'teacher' => $this->input->post('teacher'),
			'room' => $this->input->post('room')

		);
		
		$this->db->insert("classes", $data);
	}
	
	public function editClass($userId)
	{
	//Update student data in DB
		$data = array(
			'title' => $this->input->post('title'),
			'teacher' => $this->input->post('teacher'),
			'room' => $this->input->post('room')
		);

		$this->db->where('idclasses', $userId);
		$this->db->update('classes', $data); 	
	}
	
	public function validateId()
	{
	//Retrieves an ID from a form and ensures ID exists in DB
		$userId=$this->input->post('idclass');
		
		$query=$this->db->get_where('classes',array('idclasses'=>$userId)); 
		
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
	
	public function deleteClass($userId)
	{
		$this->db->delete('classes', array('idclasses' => $userId)); 
	}

	public function totalNumOfClasses()
	{
		return $this->db->count_all("classes");
	}
	
	public function paginationList($limit, $start)
	{
	//Returns an array of classes limited for pagination
        $this->db->limit($limit, $start);
        $query = $this->db->get("classes");
 
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
	
	public function getClass($userId = null)
	{
		$data = array();
		
		//If userId provided, retrieve that specific student
		if($userId!=null)
		{
			$query = $this->db->get_where("classes", array("idclasses" => $userId));
			
			if ($query->num_rows() > 0) 
			{
				$data[] = $query->row();
			}
			else
				{echo "No class found";}
		}
		//Else, if no userId provided, return multiple students
		else
		{
			$query = $this->db->select("*")->from("classes")->get();
			if ($query->num_rows() > 0) 
			{
				//Loop through each row returned from the query
				foreach ($query->result() as $row) 
				{
					$data[] = $row;
				}
			}
		}
		return $data;

	}

}