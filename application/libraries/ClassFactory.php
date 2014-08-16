<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
//adapted from tutorial at http://www.revillweb.com/tutorials/codeigniter-tutorial-learn-codeigniter-in-40-minutes/
class ClassFactory {

	private $_ci;

 	function __construct()
    {
    	//Get an instance of codeigniter to access locally
    	$this->_ci =& get_instance();
    	$this->_ci->load->model("class_model");
    }

    public function getClass($idclasses = 0) {
    	if ($idclasses > 0) {	//Specific class by id
    		$query = $this->_ci->db->get_where("classes", array("idclasses" => $idclasses));

    		if ($query->num_rows() > 0) {
    			return $this->createObjectFromData($query->row());
    		}
    		return false;
    	} else {
    		//Access all classes
    		$query = $this->_ci->db->select("*")->from("classes")->get();
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
    	$user = new Class_Model();
    	//Set the ID on the user model
    	$user->setId($row->idclasses);
    	//Set the username on the user model
    	$user->setTitle($row->title);
    	//Set the password on the user model
    	$user->setTeacher($row->teacher);
		$user->setRoom($row->room);
    	//Return the new user object
    	return $user;
    }

}