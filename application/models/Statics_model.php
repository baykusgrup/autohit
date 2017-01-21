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

    function getTop250DailyVisit(){
        $_SQL = " SELECT u.user_id,u.email, (select count(ss.website_id) from static_sitesurf_info ss where ss.user_id=u.user_id and DATE(ss.surf_date) = DATE(CURDATE())
                  limit 1) AS visitCount 
                  FROM users u 
                  ORDER BY visitCount DESC limit 250";


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
    function getTop250MountlyVisit(){
        $_SQL = " SELECT u.user_id,u.email, (select count(ss.website_id) from static_sitesurf_info ss where ss.user_id=u.user_id and DATE(ss.surf_date)  >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
                  limit 1) AS visitCount FROM users u ORDER BY visitCount DESC";


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
    function getTop250WeeklyVisit(){
        $_SQL = " SELECT u.user_id,u.email, (select count(ss.website_id) from static_sitesurf_info ss where ss.user_id=u.user_id and YEARWEEK(ss.surf_date) = YEARWEEK(CURRENT_DATE)
                  limit 1) AS visitCount FROM users u
                  ORDER BY visitCount DESC";


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
}
