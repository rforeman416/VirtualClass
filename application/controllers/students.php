<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Students extends CI_Controller {

	public function index()
	{
		$this->load->view("index_view");
	}
	
	public function addStudent()
	{
		echo "Add a student<br><br>";

		//Validation rules located in config/form_validation.php
		if ($this->form_validation->run() == FALSE)
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
	
	public function editStudent()
	{
		//$userId=$this->input->post('idstudent');
		//echo $userId;
		echo "Edit a student<br><br>";
		$this->load->library("StudentFactory");
		$data = array(
			"student" => $this->studentfactory->getStudent($userId)
		);

		//Validation rules located in config/form_validation.php
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("editStudent_view", $data);
		}
		else
		{
		echo $userId;
			$this->load->model("student_model");
			$this->student_model->editStudent($userId);
			
			$this->load->view('formsuccess');
		}
		
	}
	public function findStudentById()
	{
	$this->load->model("student_model");
	$this->student_model->validateId();
	
	}
	public function show($userId = 0)
	{
		//Always ensure an integer
		$userId = (int)$userId;
		//Load the user factory
		$this->load->library("StudentFactory");
		//Create a data array so we can pass information to the view
		$data = array(
			"students" => $this->studentfactory->getStudent($userId)
		);
		$this->load->view("student_view", $data);
	}
	


}