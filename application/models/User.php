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
       $_SQL = "SELECT * FROM users WHERE record_status=1";
       

        $query = $this->db->query($_SQL);
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
}
