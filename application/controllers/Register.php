<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function index()
    {
        $this->load->helper(['language', 'lang', 'url']);
        dilSecici();

        $this->load->view('_head');
        $this->load->view('register');
        $this->load->view('_foot');
    }

    public function insertMember(){

        $dateTime = date('Y-m-d H:i:s');

        $data=array();
        $data["email"]= $this->input->post("e_mail");
        $data["password"] = $this->input->post("password");
        $data["password_md5"] = md5($this->input->post("password"));

        $data["record_status"] = 1;
        $data["insert_date"] = $dateTime;
        $data["insert_user"] =0;
        $data["update_date"] = $dateTime;
        $data["update_user"]= 0;

        $id = $this->generalTables_model->insertTables("users",$data);


        return $id;

    }


    public function changeUserPass(){

        $old_pass = $this->input->post("oldPass");
        $new_pass = $this->input->post("newPass");
        $user_id = $this->session->userdata("user_id");
        $dateTime = date('Y-m-d H:i:s');

        $deger = $this->user->checkPassword($user_id,$old_pass);

        if($deger==true){

            $data=array();
            $data["password"]=$new_pass;
            $data["password_md5"]=md5($new_pass);

            $data["up_date"]=$dateTime;
            $data["up_user_id"]= $user_id;
            $this->generalTables_model->updateTable("user_data",$user_id,$data);
            return true;

        }else{
            return false;
        }





    }
}
