<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StudentController extends CI_Controller {

	public function index()
	{
		//Display any stored flash messages
		echo $this->session->flashdata('msg');
		$this->load->view("index_view");
	}
	
	public function addStudent()
	{//Add student name to DB
		//Validation rules located in config/form_validation.php
		if ($this->form_validation->run('student') == FALSE)
		{
			//Will load and reload on entry of invalid input
			$this->load->view("addStudent_view");
			$this->load->view('backToMain');
		}
		else
		{
			//Input accepted-add student
			$this->student_model->addStudent();
			
			$this->session->set_flashdata('msg', 'Student added successfully!');
			redirect('/studentController/index');
		}
		
	}
	
	public function searchStudent($userId =null)
	{//Display information and edit/delete/enrollment options for specific student
		
		//If no userId specified, validateId() retrieves from the form post & validates it.
		if($userId==null)
		{
			$userId=$this->student_model->validateId();
			if($userId==false){
				$this->session->set_flashdata('msg', 'No student of this ID exists');
				redirect('/studentController/index');
			}
		}
		//Data array for view, conains an array 'data' containing DB row at userId
		$data = array(
			"data" => $this->student_model->getStudent($userId),
			"userId" => $userId,
			"links"=>""
		);
		
		//Display any stored flash messages
		echo $this->session->flashdata('msg');
		
		//Displays the current DB info of given student
		$this->load->view('displayAllStudents_view', $data);
		
		//Displays the form options for editing/deleting/enrolling given student
		$this->load->view('searchResultStudent_view', $data);
		
		//Footer return link -> index
		$this->load->view('backToMain');
	}
	
	public function editStudent($userId)
	{
		//Create instance of chosen student to access data
		$students=$this->student_model->getStudent($userId);
		$data = array(
			"student" => $students[0]
		);

		//Validation rules located in config/form_validation.php
		if ($this->form_validation->run('student') == FALSE)
		{
			//Create view with previous data for editing
			$this->load->view("editStudent_view", $data);
			
			//Footer return link -> index
			$this->load->view('backToMain');
		}
		else
		{
			//Input accepted-edit student
			$this->student_model->editStudent($userId);
			
			//Reload searchStudent to display new student info
			redirect('/studentController/searchStudent/'.$userId);		
		}
	}

	public function deleteStudent($userId)
	{
		if (true)//NEED SOME KIND OF POP-UP MECHANISM TO DOUBLE CHECK
		{
			$this->student_model->deleteStudent($userId);
			$this->session->set_flashdata('msg', 'Student deleted');
			redirect('/studentController/index');
		}
		
	}
	
	public function displayAllStudents()
	{
		//Set-up pagination configs
		$config = array();
        $config["base_url"] = base_url() . "index.php/studentController/displayAllStudents/";
        $config["total_rows"] = $this->student_model->totalNumOfStudents();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		//Fill data array with lists of students to be paginated
        $data["data"] = $this->student_model->paginationList($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		
		//Display list of all students, paginated
        $this->load->view("displayAllStudents_view", $data);
		
		//Footer return link -> index
		$this->load->view('backToMain');
	}
	
	public function enroll($userId)
	{
		//Check if student has available class slots
		if($this->student_model->numOfClasses($userId)<4){
		
			//Check if student is already enrolled
			if(!$this->student_model->isEnrolled($userId)){
				
				if(!$this->student_model->enroll($userId))
					{$errormsg= "Course ID is invalid";}
				
			}else
				{$errormsg= "Already enrolled in this class";}
		}else
			{$errormsg= "Class schedule full";}
			
		$this->session->set_flashdata('msg', $errormsg);
		redirect('/studentController/searchStudent/'.$userId);
	}
	
	public function unenroll($userId)
	{
		//Check if student is already enrolled
		if($this->student_model->isEnrolled($userId)){
		
			$this->student_model->unenroll($userId);
			
		}else
			{$errormsg= "Not enrolled in this class";}
		
		$this->session->set_flashdata('msg', $errormsg);
		redirect('/studentController/searchStudent/'.$userId);
	}
}