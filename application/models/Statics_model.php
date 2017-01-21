<?php
Class Statics_model extends CI_Model
{


    function getViewedTodayCount(){
        $_SQL = "SELECT count(`website_id`) today FROM `static_sitesurf_info` WHERE DATE(`surf_date`) = DATE(CURDATE()) and record_status=1";


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
    function getViewedTodayByUserCount($user_id){
        $_SQL = "SELECT count(`website_id`) todayUserVisited FROM `static_sitesurf_info` WHERE DATE(`surf_date`) = DATE(CURDATE()) and record_status=1 and user_id=".$user_id;


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
    function getWebsitesCount(){
        $_SQL = " SELECT count(`websites_id`) countWebsite FROM `websites` WHERE record_status=1 ";


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
    function getUserCount(){
        $_SQL = " SELECT count(`user_id`) usersCount FROM `users` WHERE record_status=1 ";


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
    function getOnlineMemberViewerCount(){
        $_SQL = " SELECT count(`ipInfo_id`) countOnline FROM `ip_info` WHERE record_status=1 ";


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
}
