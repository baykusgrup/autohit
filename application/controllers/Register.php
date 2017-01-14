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

    public function insertFreelancer(){

        $dateTime = date('Y-m-d H:i:s');

        $data=array();
        $data["user_name"]= $this->input->post("user_name");
        $data["user_surname"] = $this->input->post("user_surname");
        $data["e_mail"]= $this->input->post("e_mail");
        $data["password"] = $this->input->post("password");
        $data["password_md5"] = md5($this->input->post("password"));
        $data["firm"] = 0;
        $data["e_mail"]= $this->input->post("e_mail");

        $data["status"] = 1;
        $data["reg_date"] = $dateTime;
        $data["reg_user_id"] =0;
        $data["up_date"] = $dateTime;
        $data["up_user_id"]= 0;

        $deger = $this->generalTables_model->insertTables("user_data",$data);

        if ($deger !="0"){
            $data2=array();
            $data2["user_id"]=$deger;
            $data2["freelancer_name"] =  $data["user_name"];
            $data2["freelancer_surname"]=  $data["user_surname"];


            $data2["status"] = 1;
            $data2["reg_date"] = $dateTime;
            $data2["reg_user_id"] =0;
            $data2["up_date"] = $dateTime;
            $data2["up_user_id"]= 0;

            $deger2 = $this->generalTables_model->insertTables("freelancer",$data2);
        }

        return true;

    }

    public function insertFirm(){

        $dateTime = date('Y-m-d H:i:s');

        $data=array();
        $data["user_name"]= $this->input->post("user_name");
        $data["user_surname"] = $this->input->post("user_surname");
        $data["e_mail"]= $this->input->post("e_mail");
        $data["password"] = $this->input->post("password");
        $data["password_md5"] = md5($this->input->post("password"));
        $data["firm"] = 1;
        $data["e_mail"]= $this->input->post("e_mail");

        $data["status"] = 1;
        $data["reg_date"] = $dateTime;
        $data["reg_user_id"] =0;
        $data["up_date"] = $dateTime;
        $data["up_user_id"]= 0;

        $deger = $this->generalTables_model->insertTables("user_data",$data);

        if ($deger !="0"){
            $data2=array();
            $data2["user_id"]=$deger;
            $data2["responsible_name"] =  $data["user_name"];
            $data2["responsible_surname"]=  $data["user_surname"];
            $data2["firm_name"]=  $this->input->post("firm_name");

            $data2["status"] = 1;
            $data2["reg_date"] = $dateTime;
            $data2["reg_user_id"] =0;
            $data2["up_date"] = $dateTime;
            $data2["up_user_id"]= 0;

            $deger2 = $this->generalTables_model->insertTables("firm",$data2);
        }

        return true;

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
