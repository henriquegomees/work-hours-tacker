<?php 

  class TimeRecordModel extends CI_Model {

    private function findLastRecordById($user_id) {
      $sql = "select * from time_records where date_time = (
                select max(date_time) 
                  from 
                    time_records 
                  where 
                    user_id = ? and 
                    date(date_time) = curdate()
              );";
      $query = $this->db->query($sql, array($user_id));
      
      return $query->result();
    }

    public function insertRecord($data) {
      $lastRecord = $this->findLastRecordById($data['user_id']);
      
      if(!isset($lastRecord[0])):
        $data['entry'] = 1;
        $this->db->insert('time_records', $data);
      else:
        var_dump($lastRecord[0]);
        $entry = $lastRecord[0]->entry == "0" ? 1 : 0;
        $data['entry'] = $entry;
        $this->db->insert('time_records', $data);
      endif;

      redirect('home');
    }

    public function findRecordsByUserIdAndDate($user_id, $date) {
      $sql = "select 
              id,
              date_format(date(date_time), '%d/%m/%Y') as date,
              time_format(time(date_time), '%H:%i' ) as time,
                entry 
              from 
                time_records 
              where 
                user_id = ? and 
              date(date_time) = str_to_date(?, '%d/%m/%Y') 
              order by date_time desc";

      $query = $this->db->query($sql, array($user_id, $date));
      $result = $query->result();

      if(!isset($result[0])):
        return array('error' => TRUE, 'message' => 'There is no record', 'data' => array());
      else:
        return array(
          'error' => FALSE,
          'message' => 'Records fetched successfully',
          'data' => $result
        );
      endif;
    }
  }