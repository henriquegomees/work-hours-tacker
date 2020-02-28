<?php 

  class Register extends CI_Controller {

    public function __construct() {
      parent::__construct();

      $this->load->library('form_validation');
      $this->load->helper('hashPassword');
      $this->load->model('RegisterModel');
      $this->load->model('AuthSession');
    }

    public function index() {
      $this->load->view('templates/header');
      $this->load->view('pages/register');
      $this->load->view('templates/footer'); 
    }

    private function loadRegisterValidations() {
      $this->form_validation->set_rules('username', 'name', 'required|trim');
      $this->form_validation->set_rules('email', 'e-mail', 'required|trim|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('password', 'password', 'required|trim');
      $this->form_validation->set_rules('confirmPassword', 'password confirmation', 'required|trim|matches[password]');
    }

    private function buildUserData($input) {
      $user = array(
        'name'     => $input->post('username'),
        'email'    => $input->post('email'),
        'password' => hash_password($input->post('password'))
      );

      return $user;
    }

    public function add() {
      $this->loadRegisterValidations();

      if ($this->form_validation->run()):
        $userData = $this->buildUserData($this->input);

        $id = $this->RegisterModel->insert($userData);

        if ($id > 0):
          $newUserData = array_merge($userData, array('id' => $id));
          $this->AuthSession->set($newUserData);
          
          return redirect('home');
        endif;
      else:
        $this->index();
      endif;
    }
  }