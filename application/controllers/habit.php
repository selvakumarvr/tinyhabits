<?php

class Habit extends Controller {


	function __construct()
	{
		parent::Controller();
		$this->is_logged_in();

	}

	function index()
	{


		$data['title'] = "Habit Lists";
		$username = $this->session->userdata('username');
		$data['all_habits'] = $this->Tinyhabit_model->getAllHabits($username);
		$data['current_habits'] = $this->Tinyhabit_model->getCurrentHabits($username);
		$navigation =   $this->uri->segment(3);

		if($navigation == 'listhabits')
		{
				
			$data['main_content'] = 'habitlist';
		}else if(sizeof($data['current_habits']) >=1) {

			$data['main_content'] = 'currenthabit';
		}else {

			$this->session->set_flashdata('empty_current', 'You don\'t have any current habits setup. Please set current habtis');
				
			$data['main_content'] = 'habitlist';

		}

		$this->load->vars($data);
		$this->load->view('includes/template');
	}


	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{

			redirect('login/index');
				

		}
	}


	function addhabit()
	{

		$data['main_content'] = 'addhabit_form';
		$this->load->view('includes/template', $data);
	}





	function start_tracking()

	{
			
		if ($this->input->post('ajax')) {
			$this->Tinyhabit_model->start_track_habits($this->input->post('habitid'));
		}

	}

	function create_habit()
	{
		$this->load->library('form_validation');

		// field name, error message, validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required');


		if($this->form_validation->run() == FALSE)
		{
			$data['main_content'] = 'addhabit_form';
		}

		else
		{
			$this->load->model('tinyhabit_model');

			if($query = $this->Tinyhabit_model->create_habits())
			{
				$this->index();
			}
			else
			{
				$this->load->view('signup_form');
			}
		}

	}

	function delete() {

		$deleteid = $this->input->post('deleteid');

		if ($this->input->post('ajax')) {
			$this->Tinyhabit_model->delete_habit($deleteid);
		}
		echo $deleteid;
	}


	function swapCurrent() {

		$habitid = $this->input->post('swapid');

		if ($this->input->post('ajax')) {
			$this->Tinyhabit_model->swapCurrent($habitid);
		}
		echo $habitid;
	}


	function updateHabitTracking() {

		$trackid = $this->input->post('trackid');
		$str=explode('|', $trackid, 2);

		print_r($str);
		if ($this->input->post('ajax')) {
			$this->Tinyhabit_model->update_trackhabit($str[0],$str[1]);
		}
		echo $habitid;
	}


	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

}