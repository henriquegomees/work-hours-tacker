<?php 

  class SignupModel extends CI_Model {
    private $usersTable;

    function __constructor() {
      $usersTable = 'users';
    }

    public function insert($userData) {
      $this->db->insert('users', $userData);
      return $this->db->insert_id();
    }
  }