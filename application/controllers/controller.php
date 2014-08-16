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
		//$data['userId']=$userId;
		$this->load->library("StudentFactory");
		$data = array(
			"students" => $this->studentfactory->getStudent($userId),
			"userId" => $userId
		);
		$this->load->view('displayStudents_view', $data);
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

		$this->load->library("ClassFactory");
		$data = array(
			"classes" => $this->classfactory->getClass($userId),
			"userId" => $userId
		);
		$this->load->view('displayClasses_view', $data);
		$this->load->view('searchResultClass_view', $data);
	}
	
	public function editStudent($userId)
	{
		//Create instance of chosen student to access data
		$this->load->library("StudentFactory");
		$data = array(
			"student" => $this->studentfactory->getStudent($userId)
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
		//Create instance of chosen class to access data
		$this->load->library("ClassFactory");
		$data = array(
			"class" => $this->classfactory->getClass($userId)
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
			$this->class_model->editClass($userId);
			$this->load->view('formsuccess');
		}
		
	}
	
	public function deleteStudent($userId)
	{
		if (true)//NEED SOME KIND OF POP-UP MECHANISM TO DOUBLE CHECK
		{
			$this->load->model("student_model");
			$this->student_model->deleteStudent($userId);
			$this->load->view('formsuccess');
		}
		
	}
	
	public function listAllStudents($classId){
	//list all students with classid in one of their class slots
	//class model meth listAllStudents
	}
	
	public function deleteClass($userId=0)
	{//IF CLASS DELETED, UN-ENROLL ALL STUDENTS, use list of students generated in listAllStudents model method?

		if (true)//NEED SOME KIND OF POP-UP MECHANISM TO DOUBLE CHECK
		{
			$this->load->model("class_model");
			$this->class_model->deleteStudent($userId);
			$this->load->view('formsuccess');
		}
		
	}
	
	public function displayAll($type, $userId = 0)
	{
		
		if($type=='s'){
			$this->load->library("StudentFactory");
			$data = array(
				"students" => $this->studentfactory->getStudent($userId)
			);
			$this->load->view("displayStudents_view", $data);
		}else{
			$this->load->library("ClassFactory");
			$data = array(
				"classes" => $this->classfactory->getClass($userId)
			);
			$this->load->view("displayClasses_view", $data);
		}


		
	}
	
	public function enroll($userId, $classId)
	{
	//check if student has reached max number classes (make a model method "number of classes")
	//check if already enrolled (make model method isInClass)
	//if not, put classid into class slot (make a model method "add class")
	//formsuccess
	}
	
	public function unenroll($userId, $classId)
	{
	//check if student is enrolled in class (make a model method "isInClass")
	//if yes, remove classid")
	//formsuccess
	}
}