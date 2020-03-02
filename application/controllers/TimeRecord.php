<?php

  date_default_timezone_set("America/Sao_Paulo");

  class TimeRecord extends CI_Controller {
    private $userId;
    private $HomeController;

    function __construct() {
      parent::__construct();

      $this->load->library('form_validation');
      $this->load->model('TimeRecordModel');
      $this->load->model('AuthSession');
     
      $this->userId = $this->AuthSession->get('id');
    }

    private function parseDateTime($time) {
      $date = date('Y-m-d');

      if(!$this->validateTime($time)):
        $time = date('H:i');
      endif;

      return "{$date} {$time}";
    }

    private function parseRecordData($input) {
      return array(
        'user_id' => $this->userId,
        'date_time' => $this->parseDateTime($input->post('time'))
      );
    }

    public function validateTime($time) {
      $format = 'H:i';
      $d = DateTime::createFromFormat($format, $time);
      
      if($d && $d->format($format) == $time):
        return TRUE;
      else:
        $this->form_validation->set_message('time', 'Invalid time format');
        return FALSE;
      endif;
    }

    public function addRecord() {
      $data = $this->parseRecordData($this->input);
      $this->TimeRecordModel->insertRecord($data);
    }
  }