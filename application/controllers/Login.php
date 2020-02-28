<?php

  class Login extends CI_Controller {
    
    public function __construct() {
      parent::__construct();

      $this->load->model('AuthSession');
    }

    public function index() {
      if ($this->AuthSession->get('logged')):
        return redirect('home');
      endif;

      $this->load->view('templates/header');
      $this->load->view('pages/login');
      $this->load->view('templates/footer');
    }
  }