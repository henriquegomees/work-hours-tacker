<?php 

  class AuthSession extends CI_Model {

    public function set($userData) {
      return $this->session->set_userdata(array(
        'name'   => $userData['name'],
        'email'  => $userData['email'],
        'id'     => $userData['id'],
        'logged' => TRUE
      ));
    }
  
    public function get($key = null) {
      if ($key):
        return $this->session->userdata($key);
      endif;
  
      return $this->session->userdata();
    }
  
    public function destroy() {
      $userData = $this->get();

      foreach($userData as $item => $value):
        $this->session->unset_userdata($item);
      endforeach;
    }
  }