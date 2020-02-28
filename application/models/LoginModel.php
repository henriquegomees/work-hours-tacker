<?php 

  class LoginModel extends CI_Model {

    public function __construct() {
      parent::__construct();

      $this->load->model('AuthSession');
      $this->load->helper('hashPassword');
    }

    private function errorObject() {
      return array(
        'error' => TRUE,
        'message' => 'Wrong e-mail or password. Please try again'
      );
    }

    public function authenticate($credentials) {
      $query = $this->db->get_where('users', array('email' => $credentials['email']));
      $result = $query->result();

      if (!isset($result[0])):
        return $this->errorObject();
      endif;

      $user = $result[0];
      $pwMatches = verify_password_hash($credentials['password'], $user->password);
      
      if (!$pwMatches):
        return $this->errorObject();
      endif;

      return $this->AuthSession->set(array(
        "id"    => $user->id,
        "name"  => $user->name,
        "email" => $user->email
      ));
    }
  }