<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_model extends CI_Model {

	/*
	Class attributes
	*/
	private $_idclasses;
	private $_title;
	private $_teacher;
	private $_room;
	
	public function __construct(){
		parent::__construct();
	}

	/*
	Get's & Set's
	*/
	
	public function getID(){
		return $this->_idclasses;
	}
	public function setID($val){
		$this->_idclasses = $val;
	}
	
	public function getTitle(){
		return $this->_title;
	}
	public function setTitle($val){
		$this->_title = $val;
	}
	
	public function getTeacher(){
		return $this->_teacher;
	}
	public function setTeacher($val){
		$this->_teacher = $val;
	}

	public function getRoom(){
		return $this->_room;
	}
	public function setRoom($val){
		$this->_room = $val;
	}		
	
	/*
	Class Functions
	*/
	
	public function addClass(){
	//make a data array of all student attributes
	$data = array(
			'title' => $this->input->post('title'),
			'teacher' => $this->input->post('teacher'),
			'room' => $this->input->post('room')

		);
		
		$this->db->insert("classes", $data);
	}
	
	public function editClass($userId){
		$data = array(
			'title' => $this->input->post('title'),
			'teacher' => $this->input->post('teacher'),
			'room' => $this->input->post('room')
		);

		$this->db->where('idclasses', $userId);
		$this->db->update('classes', $data); 	
	}
	
	public function validateId(){
		$userId=$this->input->post('idclass');
		$query=$this->db->get_where('classes',array('idclasses'=>$userId)); 
		if($query->num_rows() > 0){
			return $userId;
		}else{
			echo "ID does not exist.";
			return null;
		}
	}
	
	public function deleteClass($userId){
		$this->db->delete('classes', array('idclasses' => $userId)); 
	}

	public function totalNumOfClasses(){
		return $this->db->count_all("classes");
	}
	
	public function paginationList($limit, $start){		
        $this->db->limit($limit, $start);
        $query = $this->db->get("classes");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   
	}
	
	public function getClass($userId = 0){
	$data = array();
		if($userId>0){
			$query = $this->db->get_where("classes", array("idclasses" => $userId));
			if ($query->num_rows() > 0) {
				$data[] = $query->row();
			}
			else{echo "no class found";}
		}
		else{
			$query = $this->db->select("*")->from("classes")->get();
			if ($query->num_rows() > 0) {
				//Loop through each row returned from the query
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
			}
		}
		return $data;

	}

}