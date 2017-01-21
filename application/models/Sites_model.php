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
function getMySitesByUserIDAll($user_id){
        $_SQL = "SELECT w.websites_id,w.page_title,w.url,w.credits,w.visit_cost,w.duration_sec_id, w.record_status
                 FROM websites w 
                 WHERE  w.user_id=".$user_id;


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

    function getMyBlockedSitesByUserID($user_id){
        $_SQL = "SELECT w.`websites_id`,w.`url` FROM `websites` w 
                  WHERE w.`record_status`=1 and w.`blocked`=1 and w.`user_id`=".$user_id;


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
    function getWalletByUserID($user_id){
        $_SQL = "SELECT user_wallet_id,user_id,total_credits,earn_credits,wasted_credits  FROM user_wallet WHERE record_status=1 and user_id=".$user_id;


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
    function getSitesInfoBySiteID($site_id){
        $_SQL = "SELECT `websites_id`,`page_title`,`url`,`credits`,`visit_cost`,`duration_sec_id`,`unique_ip`,`hide_referer`,`random_referer`,`blocked`
                 FROM `websites`
                 WHERE `record_status`=1 and `websites_id`=".$site_id;


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
}
