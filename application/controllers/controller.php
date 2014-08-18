<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends CI_Controller {

	public function index()
	{
		$this->load->view("index_view");
	}
	
	public function addStudent()
	{
		echo "Add a student<br><br>";

		//Validation rules located in config/form_validation.php
		if ($this->form_validation->run('student') == FALSE)
		{
			$this->load->view("addStudent_view");
		}
		else
		{
			$this->load->model("student_model");
			$this->student_model->addStudent();
			$this->load->view('formsuccess');
		}
		
	}
	
	public function addClass()
	{
		echo "Add a class<br><br>";

		//Validation rules located in config/form_validation.php
		if ($this->form_validation->run('class') == FALSE)
		{
			$this->load->view("addClass_view");
		}
		else
		{
			$this->load->model("class_model");
			$this->class_model->addClass();
			$this->load->view('formsuccess');
		}
		
	}
	
	public function searchStudent()
	{
		$this->load->model("student_model");
		//Validate ID provided in index_view's form
		$userId = $this->student_model->validateId();
		if($userId==false){
			$this->load->view('formfail');
			return false;
		}
		//$this->load->library("StudentFactory");
		$data = array(
			"data" => $this->student_model->getStudent($userId),
			"userId" => $userId,
			"links"=>""
		);
		$this->load->view('displayAllStudents_view', $data);
		$this->load->view('searchResultStudent_view', $data);
	}
	
	public function searchClass()
	{
		$this->load->model("class_model");
		//Validate ID provided in index_view's form
		$userId = $this->class_model->validateId();
		if($userId==false){
			$this->load->view('formfail');
			return false;
		}

		$data = array(
			"data" => $this->student_model->getStudent($userId),
			"userId" => $userId,
			"links"=>""
		);
		$this->load->view('displayAllClasses_view', $data);
		$this->load->view('searchResultClass_view', $data);
	}
	
	public function editStudent($userId)
	{
		//Create instance of chosen student to access data
		//$this->load->library("StudentFactory");
		$this->load->model("student_model");
		$students=$this->student_model->getStudent($userId);
		$data = array(
			"student" => $students[0]
		);

		//Validation rules located in config/form_validation.php
		if ($this->form_validation->run('student') == FALSE)
		{
			//Create view with previous data for editing
			$this->load->view("editStudent_view", $data);
		}
		else
		{
			$this->load->model("student_model");
			$this->student_model->editStudent($userId);
			$this->load->view('formsuccess');
		}
		
	}

	public function editClass($userId)
	{
		//Create instance of chosen student to access data
		//$this->load->library("StudentFactory");
		$this->load->model("class_model");
		$classes=$this->class_model->getClass($userId);
		$data = array(
			"class" => $classes[0]
		);

		//Validation rules located in config/form_validation.php
		if ($this->form_validation->run('class') == FALSE)
		{
			//Create view with previous data for editing
			$this->load->view("editClass_view", $data);
		}
		else
		{
			$this->load->model("class_model");
			$this->student_model->editClass($userId);
			$this->load->view('formsuccess');
		}
		
	}
	
	public function deleteStudent($userId)
	{//pop up needed
		if (true)//NEED SOME KIND OF POP-UP MECHANISM TO DOUBLE CHECK
		{
			$this->load->model("student_model");
			$this->student_model->deleteStudent($userId);
			$this->load->view('formsuccess');
		}
		
	}
	
	public function listAllStudents($classId){
			//$this->load->library("StudentFactory");
			$this->load->model("student_model");
			$data = array(
				"data" => $this->student_model->getStudent(0,$classId)
			);
			$this->load->view("displayAll_view", $data);
	}
	
	public function deleteClass($classId=0)
	{//pop up needed
		if (true)//NEED SOME KIND OF POP-UP MECHANISM TO DOUBLE CHECK
		{
			$this->load->model("class_model");
			$this->class_model->deleteClass($classId);
			
			//$this->load->library("StudentFactory");
			$this->load->model("student_model");
			$data = $this->student_model->getStudent(0,$classId);
			//$this->load->model("student_model");
			
			foreach($data as $d){
				$this->student_model->unenroll($d->idstudents, $classId);
			}
			$this->load->view('formsuccess');
		}
		
	}
	
	public function displayAllStudents(){
		
		$this->load->model("student_model");

		$config = array();
        $config["base_url"] = base_url() . "index.php/controller/displayAllStudents/";
        $config["total_rows"] = $this->student_model->totalNumOfStudents();
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["data"] = $this->student_model->paginationList($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $this->load->view("displayAllStudents_view", $data);
	}
	
	public function displayAllClasses(){
		
		$this->load->model("class_model");

		$config = array();
        $config["base_url"] = base_url() . "index.php/controller/displayAllClasses/";
        $config["total_rows"] = $this->class_model->totalNumOfClasses();
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["data"] = $this->class_model->paginationList($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $this->load->view("displayAllClasses_view", $data);
	}
	
	public function enroll($userId)
	{
		$this->load->model("student_model");
		if($this->student_model->numOfClasses($userId)<4){
			if(!$this->student_model->isEnrolled($userId)){
			
				$this->student_model->enroll($userId);
				$this->load->view('formsuccess');
				
			}else{echo "Already enrolled in this class";}
		}else{echo "Class schedule full";}
	}
	
	public function unenroll($userId)
	{
		$this->load->model("student_model");
		if($this->student_model->isEnrolled($userId)){
		
			$this->student_model->unenroll($userId);
			$this->load->view('formsuccess');
			
		}else{echo "Not enrolled in this class";}
	}
}