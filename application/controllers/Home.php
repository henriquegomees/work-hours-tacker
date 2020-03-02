<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('AuthSession');
		$this->load->model('TimeRecordModel');
	}

	public function index($response = null) {
		if (!($this->AuthSession->get('logged'))):
			redirect('login');
			return false;
		endif;

		$data['response'] = $response;

		$this->load->view('templates/header');
		$this->load->view('pages/home', $data);
		$this->load->view('templates/footer');
	}

	public function validate_date($date) {
		$format = 'd/m/Y';
		$d = DateTime::createFromFormat($format, $date);
		
		if($d && $d->format($format) == $date):
			return TRUE;
		else:
			$this->form_validation->set_message('validate_date', 'Please provide an valid date');
			return FALSE;
		endif;
	}

	public function loadFormValidation() {
		$this->form_validation->set_rules('date', 'date', 'callback_validate_date');
	}

	public function fetchRecords() {
		$this->loadFormValidation();
		if($this->form_validation->run() == FALSE):
			$this->index();
			return false;
		endif;

		$user_id = $this->AuthSession->get('id');
		$date = $this->input->post('date');

		$response = $this->TimeRecordModel->findRecordsByUserIdAndDate($user_id, $date);
		$this->index($response);
	}
}
