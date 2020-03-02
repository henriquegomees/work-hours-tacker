<?php

  class Login extends CI_Controller {
    
    public function __construct() {
      parent::__construct();

      $this->load->library('form_validation');
      $this->load->model('AuthSession');
      $this->load->model('LoginModel');
    }

    public function index($message = null) {
      if ($this->AuthSession->get('logged')):
        return redirect('home');
      endif;

      $data['message'] = $message;

      $this->load->view('templates/header');
      $this->load->view('pages/login', $data);
      $this->load->view('templates/footer');
    }

    private function loadLoginValidations() {
      $this->form_validation->set_rules('email', 'e-mail', 'required|trim|valid_email');
      $this->form_validation->set_rules('password', 'password', 'required|trim');
    } 
    
    private function parseCredentials($input) {
      return array(
        'email'    => $input->post('email'),
        'password' => $input->post('password')
      );
    }

    public function login() {
      $this->loadLoginValidations();

      if ($this->form_validation->run() == FALSE):
        $this->index();
        return false;
      endif;

      $credentials = $this->parseCredentials($this->input);
      $authResponse = $this->LoginModel->authenticate($credentials);

      if (isset($authResponse['error'])):
        $this->index($authResponse['message']);
        return false;
      endif;

      return redirect('home');
    }

    public function logout() {
      $this->AuthSession->destroy();
      return redirect('login');
    }
  }