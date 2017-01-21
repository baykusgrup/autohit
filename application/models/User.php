<?php
Class User extends CI_Model
{
    function login($username, $password)
    {
        $this -> db -> select('user_id, email AS email, password');
        $this -> db -> where('email', $username);
        $this -> db -> where('password_md5', $password);
        $this -> db -> limit(1);
        $query = $this -> db -> get("users");
        return $query->result_array();

    }
    function getAllUserInfobyUserId($user_id){
        $_SQL = "SELECT * FROM users WHERE record_status=1 and user_id=".$user_id;


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }

    function getAllUserInfobyRefCode($refCode){
        $this -> db -> select('user_id, e_mail AS email');
        $this -> db -> where('referance_code', $refCode);
        $this -> db -> limit(1);
        $query = $this -> db -> get("users_detail");
        return $query->result_array();

    }


    function saveLoginConnection() {
        $dateTime = date('Y-m-d H:i:s');
        if ( !empty( $_SERVER['HTTP_CLIENT_IP'] ) ) { //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif ( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) { // to check ip is pass from proxy, also could be used ['HTTP_X_REAL_IP ']
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $sess_array = array();
        $sess_array["ip"]= $ip;
        $sess_array["userid"]=$this->session->userdata('user_id');
        $sess_array["login_dt"]=$dateTime;

        $this->generalTables_model->insertTables('connect',$sess_array);
    }

    function saveLogoutConnection() {
        $dateTime = date('Y-m-d H:i:s');
        if ( !empty( $_SERVER['HTTP_CLIENT_IP'] ) ) { //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif ( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) { // to check ip is pass from proxy, also could be used ['HTTP_X_REAL_IP ']
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $sess_array = array();
        $sess_array["ip"]= $ip;
        $sess_array["userid"]=$this->session->userdata('user_id');
        $sess_array["login_dt"]=date('Y-m-d H:i:s'); //null //login_dt nereden geldiği belli değil
        $sess_array["logout_dt"]=$dateTime;

        $this->generalTables_model->insertTables('connect',$sess_array);
    }

    function checkPassword($user_id,$password_old) {

        $this->db->select('password');
        $this->db->where('user_id',$user_id);
        $this->db->from('user_data');
        $pass = $this->db->get();
        $array= $pass->result_array();
        if($array[0]["password"]==$password_old){
            return true;
        }
        else{
            return false;
        }
    }

    function getIPInfo() {
        $data=array();

        $data["ip"] = $_SERVER["REMOTE_ADDR"];
        $data["tarayiciversiyonu"] = $_SERVER["HTTP_USER_AGENT"];
        $data["serverversiyonu"] = $_SERVER["SERVER_SOFTWARE"];
        $data["scriptdili"] = $_SERVER["GATEWAY_INTERFACE"];
        $data["baglantituru"] = $_SERVER["HTTP_CONNECTION"];
        $data["serveradi"] = $_SERVER["SERVER_NAME"];
        $data["kodlamaturu"] = $_SERVER["HTTP_ACCEPT_ENCODING"];
        $data["serverportu"] = $_SERVER["SERVER_PORT"];
        $data["oncekisayfa"] = $_SERVER["HTTP_REFERER"];

        return $data;

    }

    function getIPInfo_Save() {

        $dateTime = date('Y-m-d H:i:s');

        $data=array();

        $data["user_id"] = $this->session->userdata("user_id");
        $data["user_ip"] = $_SERVER["REMOTE_ADDR"];
        $data["user_browser"] = $_SERVER["HTTP_USER_AGENT"];

        $data["record_status"]=1;
        $data["insert_user"]= $this->session->userdata("user_id");
        $data["insert_date"]=$dateTime;
        $data["update_user"]= $this->session->userdata("user_id");
        $data["update_date"]=$dateTime;

        $id=$this->generalTables_model->insertTables('ip_info',$data);

        return $id;

    }
        function getIPInfo_Close() {
        $user_id = $this->session->userdata("user_id");
        $dateTime = date('Y-m-d H:i:s');

        $data=array();
        $data["record_status"]=0;

        $data["update_user"]= $user_id;
        $data["update_date"]=$dateTime;


        $this->db->where('user_id', $user_id);
        $this->db->where('record_status', 1);
        $id=  $this->db->update('ip_info', $data);



        return $id;

    }

    function getIPInfo_Control($user_id){
        $_SQL = "SELECT i.user_id,i.user_ip,i.record_status FROM ip_info i WHERE i.record_status=1 and i.user_id=".$user_id;


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }
    function controllActiveViewer($user_id){
        $_SQL = "SELECT user_id,user_ip,user_browser FROM ip_info  WHERE record_status=1 and user_id=".$user_id;


        $query = $this->db->query($_SQL);
        return $query->result_array();

    }

}
