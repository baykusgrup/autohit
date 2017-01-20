<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PrtTable_model extends CI_Model {


    function getDurations(){
        $this->db->select("prt_durations_id,durations_sec");
        $this->db->where("record_status",1);
        $sorgu=$this->db->get("prt_durations");
        return $sorgu->result_array();
    }

    function getHelps(){
        $this->db->select("prt_help_id,help_question,help_answer,help_status");
        $this->db->where("record_status",1);
        $sorgu=$this->db->get("prt_help");
        return $sorgu->result_array();
    }

    function getHelpsByLanguageID($langID){
        $SQL ="SELECT h.prt_help_id,h.help_question,h.help_answer,ph.help_status FROM help_language h 
              inner join prt_help ph on ph.record_status=1 and ph.prt_help_id=h.prt_help_id
              WHERE h.record_status=1 and h.language_id=".$langID." order by h.prt_help_id";

        $query = $this->db->query($SQL);
        return $query->result_array();
    }



}
