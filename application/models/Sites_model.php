<?php
Class Sites_model extends CI_Model
{

    function getMySitesByUserID($user_id){
        $_SQL = "SELECT w.websites_id,w.page_title,w.url,w.credits,w.visit_cost,w.duration_sec_id 
                 FROM websites w 
                 WHERE w.record_status=1 and w.user_id=".$user_id;


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }

    function getUrlsFromDatabase(){
        $_SQL = "SELECT w.`websites_id`,w.`page_title`,w.`url`,w.`credits`,w.`visit_cost`,pd.`durations_sec` FROM `websites` w 
                  inner join prt_durations pd on pd.`record_status`=1 and pd.`prt_durations_id`= w.`duration_sec_id`
                  WHERE w.`record_status`=1";


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
}
