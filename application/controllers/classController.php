<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ClassController extends CI_Controller {

	public function addClass()
	{//Add class to DB
		//Validation rules located in config/form_validation.php
		if ($this->form_validation->run('class') == FALSE)
		{
			//Will load and reload on entry of invalid input
			$this->load->view("addClass_view");
			$this->load->view('backToMain');
		}
		else
		{
			//Input accepted-add class
			$this->class_model->addClass();
			
			$this->session->set_flashdata('msg', 'Class added successfully!');
			redirect('/studentController/index');
		}
		
	}

	public function searchClass($userId =null)
	{//Display information and edit/delete options for specific class
		
		//If no userId specified, validateId() retrieves from the form post & validates it.
		if($userId==null)
		{
			$userId=$this->class_model->validateId();
			if($userId==false){
				$this->session->set_flashdata('msg', 'No class of this ID exists');
				redirect('/studentController/index');
			}
		}
		//Data array for view, conains an array 'data' containing DB row at userId
		$data = array(
			"data" => $this->class_model->getClassInfo($userId),
			"userId" => $userId,
			"links"=>""
		);
		
		//Display any stored flash messages
		echo $this->session->flashdata('msg');
		
		//Displays the current DB info of given class
		$this->load->view('displayAllClasses_view', $data);
		
		//Displays the form options for editing/deleting given class
		$this->load->view('searchResultClass_view', $data);
		
		//Footer return link -> index
		$this->load->view('backToMain');
	}

	public function editClass($userId)
	{
		//Create instance of chosen class to access data
		$classes=$this->class_model->getClassInfo($userId);
		$data = array(
			"class" => $classes[0]
		);

		//Validation rules located in config/form_validation.php
		if ($this->form_validation->run('class') == FALSE)
		{
			//Create view with previous data for editing
			$this->load->view("editClass_view", $data);
			
			//Footer return link -> index
			$this->load->view('backToMain');
		}
		else
		{
			//Input accepted-edit class
			$this->class_model->editClass($userId);
			
			//Reload searchStudent to display new class info
			redirect('/classController/searchClass/'.$userId);		
		}
	}

	public function listAllStudents($classId)
	{
	//List all students in given class
		$data = array(
			//getStudent with first param=null returns multiple students
			"data" => $this->class_model->listAllStudents($classId),
			"links" => ""
		);
		//Display list of enrolled students
		$this->load->view("displayAllStudents_view", $data);
		
		//Footer return link -> index
		$this->load->view('backToMain');
	}
	
	public function deleteClass($classId=0)
	{
		$this->class_model->deleteClass($classId);
		
		$this->session->set_flashdata('msg', 'Class deleted');
		redirect('/studentController/index');
	}
	
	public function displayAllClasses()
	{
		//Set-up pagination configs
		$config = array();
        $config["base_url"] = base_url() . "index.php/classController/displayAllClasses/";
        $config["total_rows"] = $this->class_model->totalNumOfClasses();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		//Fill data array with lists of classes to be paginated
        $data["data"] = $this->class_model->paginationList($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		
		//Display list of all classes, paginated
        $this->load->view("displayAllClasses_view", $data);
		
		//Footer return link -> index
		$this->load->view('backToMain');
	}
}