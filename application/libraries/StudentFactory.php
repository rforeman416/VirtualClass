<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
//adapted from tutorial at http://www.revillweb.com/tutorials/codeigniter-tutorial-learn-codeigniter-in-40-minutes/
class StudentFactory {

	private $_ci;

 	function __construct()
    {
    	//Get an instance of codeigniter to access locally
    	$this->_ci =& get_instance();
    	$this->_ci->load->model("student_model");
    }

    public function getStudent($idstudents = 0) {
    	if ($idstudents > 0) {	//Specific student by id
    		$query = $this->_ci->db->get_where("students", array("idstudents" => $idstudents));

    		if ($query->num_rows() > 0) {
    			return $this->createObjectFromData($query->row());
    		}
    		return false;
    	} else {
    		//Access all students
    		$query = $this->_ci->db->select("*")->from("students")->get();
    		//Check if any results were returned
    		if ($query->num_rows() > 0) {
    			//Create an array to store users
    			$users = array();
    			//Loop through each row returned from the query
    			foreach ($query->result() as $row) {
    				//Pass the row data to our local function which creates a new user object with the data provided and add it to the users array
    				$users[] = $this->createObjectFromData($row);
    			}
    			//Return the users array
    			return $users;
    		}
    		return false;
    	}
    }

    public function createObjectFromData($row) {
    	//Create a new user_model object
    	$user = new Student_Model();
    	//Set the ID on the user model
    	$user->setId($row->idstudents);
    	//Set the username on the user model
    	$user->setFirstName($row->firstName);
    	//Set the password on the user model
    	$user->setLastName($row->lastName);
		$user->setMidName($row->midName);
		$user->setClass1($row->class1);
		$user->setClass2($row->class2);
		$user->setClass3($row->class3);
		$user->setClass4($row->class4);
    	//Return the new user object
    	return $user;
    }

}