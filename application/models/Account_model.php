<?php
Class Account_model extends CI_Model
{
    function getUserAllInfoByUserID($userID)
    {

        $_SQL = "SELECT u.user_id,u.username,u.email,u.password,d.registered_date,d.view_rate,w.total_credits,w.wasted_credits,w.earn_credits,d.referance_code 
                 FROM users u 
                 inner join users_detail d on d.record_status=1 and d.user_id=u.user_id 
                 inner join user_wallet w on w.record_status=1 and w.user_id=u.user_id 
                 WHERE u.record_status=1 and u.user_id=".$userID;


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
     function getReferallsbyUserID($userID)
        {

            $_SQL = "SELECT ud.user_id,u.user_id refID,us.username,u.registered_date
                     FROM users_detail ud
                     inner join users_detail u on u.referance_code_to=ud.referance_code
                     inner join users us on us.record_status=1 and us.user_id=u.user_id
                     where ud.user_id=".$userID;


            $query = $this->db->query($_SQL);
            return $query->result_array();

        }

}
