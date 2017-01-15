<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PrtTable_model extends CI_Model {


    function getDurations(){
        $this->db->select("prt_durations_id,durations_sec");
        $this->db->where("record_status",1);
        $sorgu=$this->db->get("prt_durations");
        return $sorgu->result_array();
    }



}
